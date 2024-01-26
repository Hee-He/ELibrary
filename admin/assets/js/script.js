function toggleNav(event) {
    console.log('toggleNav called');
    let container = document.querySelector('.container');
    let iconBars = document.querySelector('.fa-bars');
    let iconTimes = document.querySelector('.fa-xmark');
    console.log('iconBars:', iconBars);
    console.log('iconTimes:', iconTimes);
    // Toggle the left position of the container
    container.style.left = container.style.left === '0px' ? '-100%' : '0';

    // Toggle the visibility of the icons
    iconBars.style.display = getComputedStyle(iconBars).getPropertyValue('display') === 'none' ? 'block' : 'none';
    iconTimes.style.display = getComputedStyle(iconTimes).getPropertyValue('display') === 'none' ? 'block' : 'none';


    // If xmark is clicked, slide back to -100%
    if (event.target.classList.contains('fa-xmark')) {
        container.style.left = '-100%';
    }
}