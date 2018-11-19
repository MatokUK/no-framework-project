document.querySelector('#type').addEventListener('change',function(){
    var selected = this.value;

    document.getElementById('prio').parentNode.setAttribute('style', 'display: none');
    document.getElementById('port').parentNode.setAttribute('style', 'display: none');
    document.getElementById('weight').parentNode.setAttribute('style', 'display: none');

    if ('mx' == selected) {
        document.getElementById('prio').parentNode.removeAttribute('style');
    }
    if ('srv' == selected) {
        document.getElementById('prio').parentNode.removeAttribute('style');
        document.getElementById('port').parentNode.removeAttribute('style');
        document.getElementById('weight').parentNode.removeAttribute('style');
    }
});