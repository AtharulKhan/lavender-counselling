/**
 * Retrieves the translation of text.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/packages/packages-i18n/
 */
import { __ } from '@wordpress/i18n';

/**
 * React hook that is used to mark the block wrapper element.
 * It provides all the necessary props like the class name.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/packages/packages-block-editor/#useblockprops
 */
import { 
	useBlockProps, 
	InspectorControls, 
	RichText,
	ColorPalette,
	MediaUpload,
	MediaUploadCheck
} from '@wordpress/block-editor';

import { 
	PanelBody, 
	TextControl, 
	Button,
	SelectControl,
	IconButton,
	Card,
	CardBody,
	Flex,
	FlexItem,
	FlexBlock,
	__experimentalItemGroup as ItemGroup,
	__experimentalItem as Item
} from '@wordpress/components';

import { useState } from '@wordpress/element';

/**
 * Lets webpack process CSS, SASS or SCSS files referenced in JavaScript files.
 * Those files can contain any CSS code that gets applied to the editor.
 *
 * @see https://www.npmjs.com/package/@wordpress/scripts#using-css
 */
import './editor.scss';

/**
 * The edit function describes the structure of your block in the context of the
 * editor. This represents what the editor will render when the block is used.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/block-api/block-edit-save/#edit
 *
 * @return {Element} Element to render.
 */
export default function Edit({ attributes, setAttributes }) {
	const { sectionTitle, sectionDescription, cards } = attributes;
	const blockProps = useBlockProps();

	const updateCard = (index, field, value) => {
		const newCards = [...cards];
		newCards[index] = { ...newCards[index], [field]: value };
		setAttributes({ cards: newCards });
	};

	const updateCardItem = (cardIndex, itemIndex, field, value) => {
		const newCards = [...cards];
		const newItems = [...newCards[cardIndex].items];
		newItems[itemIndex] = { ...newItems[itemIndex], [field]: value };
		newCards[cardIndex] = { ...newCards[cardIndex], items: newItems };
		setAttributes({ cards: newCards });
	};

	const addCard = () => {
		if (cards.length >= 6) return;
		
		const newCard = {
			id: `card-${Date.now()}`,
			title: 'New Card',
			listType: 'links',
			items: [{ text: 'Item 1', url: '#' }],
			backgroundColor: '#FFF4E6',
			borderColor: '#FF8C00'
		};
		setAttributes({ cards: [...cards, newCard] });
	};

	const removeCard = (index) => {
		const newCards = cards.filter((_, i) => i !== index);
		setAttributes({ cards: newCards });
	};

	const addCardItem = (cardIndex) => {
		const newCards = [...cards];
		const newItem = cards[cardIndex].listType === 'links' 
			? { text: 'New Item', url: '#' }
			: { text: 'New Item' };
		newCards[cardIndex].items.push(newItem);
		setAttributes({ cards: newCards });
	};

	const removeCardItem = (cardIndex, itemIndex) => {
		const newCards = [...cards];
		newCards[cardIndex].items = newCards[cardIndex].items.filter((_, i) => i !== itemIndex);
		setAttributes({ cards: newCards });
	};

	const defaultColors = [
		{ name: 'Light Orange', color: '#FFF4E6' },
		{ name: 'Light Blue', color: '#E6F3FF' },
		{ name: 'Light Green', color: '#E6FFE6' },
		{ name: 'Light Purple', color: '#F3E6FF' },
		{ name: 'Light Pink', color: '#FFE6F3' },
		{ name: 'Light Yellow', color: '#FFFFE6' }
	];

	const borderColors = [
		{ name: 'Orange', color: '#FF8C00' },
		{ name: 'Blue', color: '#0066CC' },
		{ name: 'Green', color: '#00AA00' },
		{ name: 'Purple', color: '#8800CC' },
		{ name: 'Pink', color: '#CC0066' },
		{ name: 'Yellow', color: '#CCAA00' }
	];

	return (
		<>
			<InspectorControls>
				<PanelBody title={__('Information Hub Settings', 'information-hub')}>
					<p>{__('Add up to 6 information cards', 'information-hub')}</p>
					{cards.length < 6 && (
						<Button 
							variant="primary" 
							onClick={addCard}
							style={{ marginBottom: '20px', width: '100%' }}
						>
							{__('Add New Card', 'information-hub')}
						</Button>
					)}
				</PanelBody>

				{cards.map((card, cardIndex) => (
					<PanelBody 
						key={card.id} 
						title={`${__('Card', 'information-hub')} ${cardIndex + 1}: ${card.title}`}
						initialOpen={cardIndex === 0}
					>
						<TextControl
							label={__('Card Title', 'information-hub')}
							value={card.title}
							onChange={(value) => updateCard(cardIndex, 'title', value)}
						/>

						<SelectControl
							label={__('List Type', 'information-hub')}
							value={card.listType}
							options={[
								{ label: 'Links', value: 'links' },
								{ label: 'Checkmarks', value: 'checkmarks' },
								{ label: 'Bullet Points', value: 'bullets' }
							]}
							onChange={(value) => updateCard(cardIndex, 'listType', value)}
						/>

						<div style={{ marginBottom: '20px' }}>
							<p style={{ marginBottom: '10px' }}>{__('Background Color', 'information-hub')}</p>
							<ColorPalette
								colors={defaultColors}
								value={card.backgroundColor}
								onChange={(value) => updateCard(cardIndex, 'backgroundColor', value)}
							/>
						</div>

						<div style={{ marginBottom: '20px' }}>
							<p style={{ marginBottom: '10px' }}>{__('Border Color', 'information-hub')}</p>
							<ColorPalette
								colors={borderColors}
								value={card.borderColor}
								onChange={(value) => updateCard(cardIndex, 'borderColor', value)}
							/>
						</div>

						<div style={{ marginBottom: '20px' }}>
							<h4>{__('List Items', 'information-hub')}</h4>
							{card.items.map((item, itemIndex) => (
								<Flex key={itemIndex} style={{ marginBottom: '10px' }}>
									<FlexBlock>
										<TextControl
											label={__('Text', 'information-hub')}
											value={item.text}
											onChange={(value) => updateCardItem(cardIndex, itemIndex, 'text', value)}
										/>
										{card.listType === 'links' && (
											<TextControl
												label={__('URL', 'information-hub')}
												value={item.url}
												onChange={(value) => updateCardItem(cardIndex, itemIndex, 'url', value)}
											/>
										)}
									</FlexBlock>
									<FlexItem>
										<Button
											isDestructive
											icon="trash"
											label={__('Remove Item', 'information-hub')}
											onClick={() => removeCardItem(cardIndex, itemIndex)}
										/>
									</FlexItem>
								</Flex>
							))}
							<Button 
								variant="secondary" 
								onClick={() => addCardItem(cardIndex)}
								style={{ marginTop: '10px' }}
							>
								{__('Add Item', 'information-hub')}
							</Button>
						</div>

						<Button 
							isDestructive 
							onClick={() => removeCard(cardIndex)}
							style={{ width: '100%' }}
						>
							{__('Remove Card', 'information-hub')}
						</Button>
					</PanelBody>
				))}
			</InspectorControls>

			<div {...blockProps}>
				<div className="information-hub-wrapper">
					<RichText
						tagName="h2"
						value={sectionTitle}
						onChange={(value) => setAttributes({ sectionTitle: value })}
						placeholder={__('Enter section title...', 'information-hub')}
						className="information-hub-title"
					/>
					
					<RichText
						tagName="p"
						value={sectionDescription}
						onChange={(value) => setAttributes({ sectionDescription: value })}
						placeholder={__('Enter section description...', 'information-hub')}
						className="information-hub-description"
					/>

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
		</>
	);
}