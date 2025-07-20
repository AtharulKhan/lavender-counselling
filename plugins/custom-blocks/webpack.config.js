const defaultConfig = require( '@wordpress/scripts/config/webpack.config' );
const path = require( 'path' );
const glob = require( 'glob' );

// Get all block directories
const blockDirectories = glob.sync( './src/**/block.json', {
	ignore: ['./src/node_modules/**']
} );

// Create entry points for each block
const entryPoints = blockDirectories.reduce( ( entries, blockPath ) => {
	const blockDir = path.dirname( blockPath );
	const blockName = path.basename( blockDir );
	
	// Check if index.js exists
	const indexPath = path.join( blockDir, 'index.js' );
	if ( glob.sync( indexPath ).length ) {
		entries[ `${blockName}/index` ] = path.resolve( process.cwd(), indexPath );
	}
	
	// Check if view.js exists
	const viewPath = path.join( blockDir, 'view.js' );
	if ( glob.sync( viewPath ).length ) {
		entries[ `${blockName}/view` ] = path.resolve( process.cwd(), viewPath );
	}
	
	return entries;
}, {} );

module.exports = {
	...defaultConfig,
	entry: entryPoints,
	output: {
		...defaultConfig.output,
		path: path.resolve( process.cwd(), 'build' ),
		filename: '[name].js'
	},
	module: {
		...defaultConfig.module,
		rules: [
			...defaultConfig.module.rules,
			{
				test: /block\.json$/,
				type: 'asset/resource',
				generator: {
					filename: ( pathData ) => {
						const blockName = path.basename( path.dirname( pathData.filename ) );
						return `${blockName}/[name][ext]`;
					}
				}
			}
		]
	}
};