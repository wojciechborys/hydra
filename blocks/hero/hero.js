import { registerBlockType } from '@wordpress/blocks';
import { TextControl } from '@wordpress/components';

registerBlockType('hydra/hero', {
  title: 'Hero Section',
  icon: 'smiley',
  category: 'common',
  attributes: {
    content: {
      type: 'string',
      default: 'Hero, Hydra',
    },
  },
  edit: ({ attributes, setAttributes }) => (
    <div>
      <h3>Hello Gutenberg Block</h3>
      <TextControl
        label="Content"
        value={attributes.content}
        onChange={(content) => setAttributes({ content })}
      />
    </div>
  ),
  save: ({ attributes }) => (
    <div>
      <p>{attributes.content}</p>
    </div>
  ),
});
