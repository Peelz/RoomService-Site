$('#subject-input').search({
    apiSettings: {
      url: '/api/search/instrutor?name={query}'

    },
    // type: 'category',
    searchFields:{
        results: 'items',
        title: 'subject_name',
        description: 'subject_id',
        action: 'enitity_id'
    },

    minCharacters : 3,
    showNoResults : true

  })
;
