import { registerDynamicChunk, getCurrentScreen } from 'blocksy-frontend'
import ctEvents from 'ct-events'

let store = {}

export const afterRequest = (panel, e) => {
	setTimeout(() => {
		ctEvents.trigger('ct:overlay:handle-click', {
			e,
			href: `#${panel.id}`,
			options: {
				openStrategy: 'skip',
				isModal: true,
				computeScrollContainer: () => {
					if (!panel.closest('body')) {
						return null
					}

					return panel.querySelector('.ct-panel-content-inner')
				},
				clickOutside: true,
				focus: false,
			},
		})
	})
}

const cachedFetch = (url) =>
	store[url]
		? new Promise((resolve) => {
				resolve(store[url])
				store[url] = store[url].clone()
		  })
		: new Promise((resolve) =>
				fetch(url).then((response) => {
					resolve(response)
					store[url] = response.clone()
				})
		  )

export const getFetchDescriptorFor = (trigger) => {
	const searchParams = new URLSearchParams(location.search)

	if (window.wp && window.wp.customize) {
		searchParams.append(
			'filter_panel_position',
			wp.customize('filter_panel_position')()
		)
		searchParams.append('filter_source', wp.customize('filter_source')())
		searchParams.append(
			'filter_panel_close_on_select',
			wp.customize('filter_panel_close_on_select')()
		)
	}

	searchParams.append('blocksy_ajax', 'yes')

	const fetchUrl = `${location.origin}${
		location.pathname
	}?${searchParams.toString()}`

	return {
		isCached: !!store[fetchUrl],

		fetch: () =>
			new Promise((r) => {
				cachedFetch(fetchUrl)
					.then((r) => r.text())
					.then((data) => {
						const parser = new DOMParser()

						const doc = parser.parseFromString(data, 'text/html')

						r(doc.querySelector('#woo-filters-panel'))
					})
			}),
	}
}

const insertInlineContent = (content, el) => {
	document.querySelector('#woo-filters-panel').innerHTML = content.innerHTML

	const newTrigger = el.cloneNode(true)

	newTrigger.classList.add('ct-expandable-trigger')

	newTrigger.setAttribute('aria-expanded', 'true')

	el.parentNode.replaceChild(newTrigger, el)

	setTimeout(() => {
		ctEvents.trigger('blocksy:frontend:init')
		newTrigger.click()
	}, 200)
}

const openOffcanvasFilter = ({ event, el, completeAction }) => {
	if (document.querySelector('#woo-filters-panel')) {
		const panel = document.querySelector('#woo-filters-panel')

		completeAction({
			finalState: '',
			onCompleted: () => {
				ctEvents.trigger('ct:overlay:handle-click', {
					event,
					options: {
						openStrategy: 'fast',
						container: panel,
					},
				})
			},
		})

		return
	}

	const fetchDescriptor = getFetchDescriptorFor(el)

	fetchDescriptor.fetch().then((content) => {
		completeAction({
			finalState: '',
			onCompleted: () => {
				document.querySelector('.ct-drawer-canvas').appendChild(content)
				const panel = document.querySelector('#woo-filters-panel')

				setTimeout(() => {
					ctEvents.trigger('ct:overlay:handle-click', {
						event,
						options: {
							openStrategy: 'fast',
							container: panel,
						},
					})

					afterRequest(panel, event)
				}, 10)
			},
		})
	})
}

registerDynamicChunk('blocksy_ext_woo_extra_filters_ajax_reveal', {
	mount: (el, { event, completeAction }) => {
		event.preventDefault()
		event.stopPropagation()

		if (el.dataset.togglePanel) {
			openOffcanvasFilter({
				event,
				el,
				completeAction,
			})
		} else {
			const fetchDescriptor = getFetchDescriptorFor(el)

			fetchDescriptor.fetch().then((content) => {
				completeAction({
					finalState: '',
					onCompleted: () => {
						insertInlineContent(content, el)
					},
				})
			})
		}
	},

	/*
	maybeGetPanelContent: (el, { event }) => {
		// we don't need to refetch content because content is handled by ajax filter logic
		console.log(
			'Blocksy WooCommerce Extra: Ajax filter reveal - maybeGetPanelContent is not needed.',
			el
		)
		return new Promise((resolve) => {
			// TODO: maybe implement actual content retrieval if will be
			// needed in the future.
			resolve('')
		})
	},
    */
})
