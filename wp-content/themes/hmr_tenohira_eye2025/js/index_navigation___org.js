document.addEventListener('DOMContentLoaded', function () {
  const navContainer = document.querySelector('.index_navigation');
  if (!navContainer) return;

  const tocList = document.createElement('ul');
  let currentH2Item = null; // 現在処理中のh2のli
  let sibling = navContainer.nextElementSibling;

  // index_navigation以降のすべての要素を走査
    let index = 1;
  while (sibling) {
    // 子孫からh2,h3を抽出
    const headings = sibling.querySelectorAll('h2, h3');
    headings.forEach(heading => {
      if (! heading.id) {
        // idを生成
        // const baseId = heading.textContent.trim().toLowerCase().replace(/\s+/g, '-').replace(/[^\w\-]/g, '');
        let id = 'index_' + index++;
        // while (document.getElementById(id)) {
        //   id = `-${i++}`;
        // }
          console.log(`Setting id for heading: ${heading.textContent} -> ${id}`);
        heading.id = id;
      }

      const link = document.createElement('a');
      link.href = `#${heading.id}`;
      link.textContent = heading.textContent;

      const li = document.createElement('li');
      li.appendChild(link);

      if (heading.tagName === 'H2') {
        currentH2Item = li;
        tocList.appendChild(li);
      } else if (heading.tagName === 'H3') {
        if (!currentH2Item) {
          // h3が先に来てしまった場合、安全のためにトップレベルに入れる
          tocList.appendChild(li);
        } else {
          let nestedUl = currentH2Item.querySelector('ul');
          if (!nestedUl) {
            nestedUl = document.createElement('ul');
            currentH2Item.appendChild(nestedUl);
          }
          nestedUl.appendChild(li);
        }
      }
    });

    sibling = sibling.nextElementSibling;
  }

  if (tocList.children.length > 0) {
    navContainer.appendChild(tocList);
  }
});
