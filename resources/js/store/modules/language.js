const state = {
    languages: ['ar','en'],
}

// getters
const getters = {
    languages: state => state.languages,
}

export default  {
    namespaced: true,
    state,
    getters,
}