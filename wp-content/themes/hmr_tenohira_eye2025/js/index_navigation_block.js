( function() {
  var el = wp.element.createElement;
  var blocks = wp.blocks;

  console.log(wp);
  blocks.registerBlockType('hmr-block/index-navigation', {
    title: '記事目次',
    description: '記事の目次を挿入します',
    icon: 'text',
    category: 'text',
    example: {},
    edit: () => el('div',
      {
        style: {
          backgroundColor: '#90a0ea3b',
          color: 'black',
          padding: '1rem .5rem',
          position: 'relative',
          border: '1px solid #676767ff',
        },
      },
      el('h3',
        {
          style: { fontWeight: 'bold' }
        },
        'ここに目次が挿入されます'
      ),
      el('p',
        {
          style: { fontSize: '0.9rem' }
        },
        '目次を表示するには、記事内に見出し（h2, h3）を使用してください'
      )
    ),
    save: () => el('div',
      {
        className: 'index_navigation',
      },
      '[index_navigation]'
    )
    // save: () => el('div',
    //   {
    //     className: 'index_navigation',
    //   },
    //   el('h2',
    //     {
    //       style: { textAlign: 'center' }
    //     },
    //     '目次'
    //   ),
    //   el('script',
    //     {
    //       type: 'text/javascript',
    //       src: wp.url.getPath('theme') + '/js/index_navigation.js'
    //     })
    // )
  });

}());