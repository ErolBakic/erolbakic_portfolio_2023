window.addEventListener('DOMContentLoaded', () => {

    // Nav scroll
    if(document.querySelector('#target-nav')){
        document.querySelectorAll('#target-nav a').forEach(item => {
            item.addEventListener('click', (e) => {
                e.preventDefault();

                const id = item.getAttribute('href');
                document.querySelector(id).scrollIntoView({
                    behavior: 'smooth'
                });
            })
        });
    }

    // Case click
    if(document.querySelector('#target-cases')){
        const caseNav = document.querySelector('#target-cases');
        const endpoint = caseNav.dataset.action;

        caseNav.querySelectorAll('li').forEach(item => {
            item.querySelector('button').addEventListener('click', (e) => {
                const caseID = e.target.dataset.goto;

                // Change active point
                document.querySelector('#target-cases .active').classList.remove('active');

                // Hide case
                document.querySelector('#target-case').classList.add('case--loading');

                document.querySelector('.cases__example').classList.add('cases__example--loading');

                fetch(endpoint, {
                    method     : 'POST',
                    headers    : {'Content-Type': 'application/json'},
                    body       : JSON.stringify({
                        caseID : caseID
                    })
                })
                .then(resp => resp.json())
                .then(data => {
                    if(data.code == 200){
                        changeCase(JSON.parse(data.content));
                    } else {
                        alert(data.message);
                    }
                })
                .catch(err => alert(err));
            });
        });
    }

    // Wait function
    const wait = (callback) => {
        setTimeout(() => {
            callback();
        }, 1000);
    }

    // Change case content
    const changeCase = (content) => {
        if(!content) return alert('Fejl!');

        //
        const target = document.querySelector('#target-case');
        document.querySelector(`.slider-nav__btn[data-goto="${content.id}"]`).classList.add('active');

        // Init wait
        wait(() => {

            // Title
            target.querySelector('.title').innerHTML = content.title;

            // Content
            target.querySelector('.description__content').innerHTML = content.content;

            // Technologies
            target.querySelector('.technologies').innerHTML = ''
            Object.entries(content.technologies).reverse().forEach((svg) => {
                output = '<li class="technologies__item" title="' + svg[0] + '">' + svg[1] + '</li>';
                target.querySelector('.technologies').insertAdjacentHTML('afterbegin', output);
            });

            // Btns
            target.querySelector('.btn').innerHTML = '';
            content.links.reverse().forEach(link => {

                // Regular btn
                if(!link['goto']['url'].includes('#')){
                    const output = (`
                        <a target="_blank" href="${link['goto']['url']}" class="btn__link">
                            <span class="btn__gfx">
                                <svg xmlns="http://www.w3.org/2000/svg" width="23.589" height="23.589" viewBox="0 0 23.589 23.589">
                                <path id="Path_13" data-name="Path 13" d="M19.9,14.743H18.429a.737.737,0,0,0-.737.737v5.16H2.949V5.9H9.583a.737.737,0,0,0,.737-.737V3.686a.737.737,0,0,0-.737-.737H2.211A2.211,2.211,0,0,0,0,5.16V21.377a2.211,2.211,0,0,0,2.211,2.211H18.429a2.211,2.211,0,0,0,2.211-2.211v-5.9A.737.737,0,0,0,19.9,14.743ZM21.869,0h-7.31a1.29,1.29,0,0,0-1.29,1.29v.862A1.29,1.29,0,0,0,14.6,3.4l3.1-.088L6.222,14.7l0,0a1.106,1.106,0,0,0,0,1.564l1.1,1.1,0,0a1.106,1.106,0,0,0,1.562,0L20.272,5.9l-.087,3.1V9.03a1.29,1.29,0,0,0,1.29,1.29H22.3a1.29,1.29,0,0,0,1.29-1.29V1.72h0A1.72,1.72,0,0,0,21.869,0Z" fill="#282a2e"></path>
                                </svg>
                            </span>
                            ${link['goto']['title']}                    
                        </a>
                    `);
                    target.querySelector('.btn').insertAdjacentHTML('afterbegin', output);
                    
                // Special btn
                } else {
                    const delimeters = link['goto']['url'].split('#');
                    const attributes = delimeters[1].split('=');

                    const output = (`
                        <form target="_blank" action="${delimeters[0]}" method="post">
                            <button type="submit" class="btn__link btn__link--button">
                                <input type="hidden" name="${attributes[0]}" value="${attributes[1]}">

                                <span class="btn__gfx">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="23.589" height="23.589" viewBox="0 0 23.589 23.589">
                                        <path id="Path_13" data-name="Path 13" d="M19.9,14.743H18.429a.737.737,0,0,0-.737.737v5.16H2.949V5.9H9.583a.737.737,0,0,0,.737-.737V3.686a.737.737,0,0,0-.737-.737H2.211A2.211,2.211,0,0,0,0,5.16V21.377a2.211,2.211,0,0,0,2.211,2.211H18.429a2.211,2.211,0,0,0,2.211-2.211v-5.9A.737.737,0,0,0,19.9,14.743ZM21.869,0h-7.31a1.29,1.29,0,0,0-1.29,1.29v.862A1.29,1.29,0,0,0,14.6,3.4l3.1-.088L6.222,14.7l0,0a1.106,1.106,0,0,0,0,1.564l1.1,1.1,0,0a1.106,1.106,0,0,0,1.562,0L20.272,5.9l-.087,3.1V9.03a1.29,1.29,0,0,0,1.29,1.29H22.3a1.29,1.29,0,0,0,1.29-1.29V1.72h0A1.72,1.72,0,0,0,21.869,0Z" fill="#282a2e"></path>
                                    </svg>
                                </span>
                                ${link['goto']['title']}
                            </button>
                        </form>
                    `);
                    target.querySelector('.btn').insertAdjacentHTML('afterbegin', output);
                }

            });

            // Cover
            if(target.querySelector('.video')){
                target.querySelector('.video').remove();
                target.classList.remove('case--video');
            } else {
                target.removeAttribute('style');
            }
            const cover = content.cover;

            // Change cover
            if(cover.substr(cover.lastIndexOf('.') + 1) == 'mp4' || cover.substr(cover.lastIndexOf('.') + 1) == 'webm'){
                target.insertAdjacentHTML('beforeend', `<video class="video" src="${cover}" muted loop autoplay><video>`);
                target.classList.add('case--video');
            }

            target.setAttribute('style', `background-image: url("${content.mobile_cover}")`);

            // Show case
            document.querySelector('.cases__example').classList.remove('cases__example--loading');
            target.classList.remove('case--loading');
        });
    }
});