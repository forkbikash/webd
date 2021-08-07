const template = document.createElement('template');
template.innerHTML = `
<style>
.nav
{
    position: sticky;
    top: 0px;
    left: 0px;
    display: flex;
    justify-content: space-around;
    text-transform: uppercase;
    align-items: center;
    width: 100%;
    height: 7vh;
    letter-spacing: 1px;
}

.nav .a
{
    text-decoration: none;
}

.nav > .ul
{
    list-style: none;
    display: flex;
    justify-content: space-between;
    width: 40%;
}

.burger
{
    display: none;
}

.nav .a:hover
{
    background-color: #01b6e1;
}

.burger:hover
{
    background-color: #01b6e1;
}

@media screen and (max-width: 760px)
{
    .nav > .ul
    {
        margin:0;
        flex-direction: column;
        justify-content: space-evenly;
        align-items: center;
        background-image: linear-gradient(to right, #0a72d1, #01b6e1);
        position: fixed;
        width: 50%;
        height: 93vh;
        top: 7vh;
        left: 0px;
        display: none;
    }
    .burger
    {
        display: block;
        width: 35px;
        cursor: pointer;
    }
    .burger .line
    {
        border: 1px solid;
        margin: 6px;
        border-radius: 100px;
    }
    .nav
    {
        justify-content: flex-start;
        column-gap: 50px;
    }
}
</style>

<nav class="nav">
<div class="burger">
    <div class="line"></div>
    <div class="line"></div>
    <div class="line"></div>
</div>
<h1 class="logo">
    <a href="#" class="a">Logo</a>
</h1>
<ul class="ul">
    <li class="li"><a href="#" class="a">home</a></li>
    <li class="li"><a href="#" class="a">service</a></li>
    <li class="li"><a href="#" class="a">about</a></li>
    <li class="li"><a href="#" class="a">contact</a></li>
</ul>
</nav>
`;

class CustomNav extends HTMLElement {
    constructor() {
        super();
        this.attachShadow({ mode: 'open' });
        this.shadowRoot.appendChild(template.content.cloneNode(true));
        this.shadowRoot.querySelector('.nav').style.backgroundImage = this.getAttribute('nav-background-image');
        const navAnchors = this.shadowRoot.querySelectorAll('.nav .a');
        const burgerLines = this.shadowRoot.querySelectorAll('.burger .line');

        for (let i = 0; i < navAnchors.length; i++) {
            navAnchors[i].style.color = this.getAttribute('nav-text-color');
        }

        for (let i = 0; i < burgerLines.length; i++) {
            burgerLines[i].style.borderColor = this.getAttribute('nav-text-color');
        }
    }

    connectedCallback() {
        const burger = this.shadowRoot.querySelector('.burger');
        const navToggle = this.shadowRoot.querySelector('.nav .ul');

        burger.addEventListener('click', () => {
            if (navToggle.style.display === 'flex') {
                navToggle.style.display = 'none';
            } else {
                navToggle.style.display = 'flex';
            }
        });
    }

    disconnectedCallback() {
        this.shadowRoot.querySelector('.burger').removeEventListener();
    }
}

window.customElements.define('custom-nav', CustomNav);