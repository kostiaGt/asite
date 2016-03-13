var ProductView = Backbone.View.extend({
    
   template: '#new-div-product',
    initialize: function () { 
          this.render();
    },
    
    render: function() { 
        var template = _.template($(this.template).html());
        this.$el.html( template(this.model.toJSON()));
        $('#products-items').html(this.$el.html());
    },
    
    events: {
        "click .btn-small": function() {
            alert(12);
        }
    }
});