/**
 * React hook that is used to mark the block wrapper element.
 * It provides all the necessary props like the class name.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/packages/packages-block-editor/#useblockprops
 */
import { useBlockProps, RichText } from '@wordpress/block-editor';

/**
 * The save function defines the way in which the different attributes should
 * be combined into the final markup, which is then serialized by the block
 * editor into `post_content`.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/block-api/block-edit-save/#save
 *
 * @return {Element} Element to render.
 */
export default function save({ attributes }) {
	const { sectionTitle, sectionDescription, cards } = attributes;
	const blockProps = useBlockProps.save();

	return (
		<div {...blockProps}>
			<div className="information-hub-wrapper">
				{sectionTitle && (
					<RichText.Content 
						tagName="h2" 
						value={sectionTitle} 
						className="information-hub-title"
					/>
				)}
				
				{sectionDescription && (
					<RichText.Content 
						tagName="p" 
						value={sectionDescription} 
						className="information-hub-description"
					/>
				)}

				<div className="information-hub-cards">
					{cards.map((card, index) => (
						<div 
							key={card.id} 
							className="information-card"
							style={{
								backgroundColor: card.backgroundColor,
								borderColor: card.borderColor
							}}
						>
							<h3>{card.title}</h3>
							<ul className={`card-list ${card.listType}`}>
								{card.items.map((item, itemIndex) => (
									<li key={itemIndex}>
										{card.listType === 'checkmarks' && <span className="checkmark">✓</span>}
										{card.listType === 'links' ? (
											<a href={item.url}>{item.text}</a>
										) : (
											<span>{item.text}</span>
										)}
									</li>
								))}
							</ul>
						</div>
					))}
				</div>
			</div>
		</div>
	);
}