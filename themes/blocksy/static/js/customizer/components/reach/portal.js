import {
	createElement,
	useEffect,
	createPortal,
	useState,
	Fragment,
} from '@wordpress/element'
import Component from './component-component'

let Portal = ({
	children,
	container = document.body,
	type = 'reach-portal',
}) => (
	<Component
		getRefs={() => ({ node: null })}
		didMount={({ refs, forceUpdate }) => {
			let containerNode = container.hasOwnProperty('current')
				? container.current
				: container
			refs.node = document.createElement(type)
			containerNode.appendChild(refs.node)
			forceUpdate()
		}}
		willUnmount={({ refs: { node } }) => {
			let containerNode = container.hasOwnProperty('current')
				? container.current
				: container
			if (containerNode) {
				containerNode.removeChild(node)
			}
		}}
		render={({ refs: { node } }) => {
			return node ? createPortal(children, node) : null
		}}
	/>
)

export default Portal
