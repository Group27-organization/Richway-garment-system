var today = new Date();
var calendar = new Calendar({
target: document.querySelector("#calendar"),
data: {
escape: false,
view: 'calendar',
year:  new Date().getFullYear(),
month: today.getMonth(),
}
})
calendar.set({message: ''})
fetch("demo/entries.json").then(r => r.json()).then(data => {
var entries = calendar.get('entries')
entries = entries.concat(data.entries)
calendar.set({entries: entries, message: ''})
})

function debug() {
document.querySelector('#debug').textContent = JSON.stringify(calendar.get(), null, 4)
}