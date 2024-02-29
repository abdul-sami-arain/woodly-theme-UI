 (function($){
    "use strict";

jQuery(document).ready(function($) {
  
    jQuery('.woodly-side-meta-style2-main').theiaStickySidebar({
      // Settings
      additionalMarginTop: 30
    });
 
    
  $('.woodly-add-to-wishlist').on('click', function(e){
            e.preventDefault();
            var self = $(this);
            var id = false;
            id = self.data('id');
            if(!id) return false;
            var link = $(this).attr('data-wishlist-link');
            $(this).find('.btn-icon').removeClass('icon-heart1');
            var loading_icon = '<svg class="woodly-icon-loading" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M2.854 7.146a.5.5 0 00-.708 0l-2 2a.5.5 0 10.708.708L2.5 8.207l1.646 1.647a.5.5 0 00.708-.708l-2-2zm13-1a.5.5 0 00-.708 0L13.5 7.793l-1.646-1.647a.5.5 0 00-.708.708l2 2a.5.5 0 00.708 0l2-2a.5.5 0 000-.708z" clip-rule="evenodd"/><path fill-rule="evenodd" d="M8 3a4.995 4.995 0 00-4.192 2.273.5.5 0 01-.837-.546A6 6 0 0114 8a.5.5 0 01-1.001 0 5 5 0 00-5-5zM2.5 7.5A.5.5 0 013 8a5 5 0 009.192 2.727.5.5 0 11.837.546A6 6 0 012 8a.5.5 0 01.501-.5z" clip-rule="evenodd"/></svg>';
            $(this).find('.btn-icon').addClass('').html(loading_icon);
            var data = {
                add_to_wishlist: id,
                product_type: 'simple',
                action: 'add_to_wishlist'
            }
            if(self.hasClass('remove-item')){
                link = yith_wcwl_l10n.ajax_url;
                data = {
                    remove_from_wishlist: id,
                    product_type: 'simple',
                    action: yith_wcwl_l10n.actions.remove_from_wishlist_action,
                    nonce: yith_wcwl_l10n.nonce.remove_from_wishlist_nonce,
                    context: 'frontend',
                    fragments: retrieve_fragments( id )
                }
            }
            return $.ajax({
                url: link,
                data: data,
                method: 'POST'
            }).done(function (data) {

                if(self.hasClass('remove-item')){
                    self.removeClass('remove-item');
                    self.find('.btn-icon').removeClass('woodlyicon-rotate-right woodly-icon-loading text-red').html('');
                    self.find('.btn-icon').addClass('text-body-default icon-heart1');
                    let wishCount = Number($('.yith-wcwl-items-count').html());
                    if(wishCount&&wishCount>0){
                        wishCount--;
                        $('.yith-wcwl-items-count').html(wishCount);
                    }
                }else{
                    self.find('.btn-icon').removeClass('woodlyicon-rotate-right woodly-icon-loading text-body-default').html('');
                    self.find('.btn-icon').addClass('text-red icon-heart1');
                    self.addClass('remove-item');
                    let wishCount = Number($('.yith-wcwl-items-count').html());
                    if(wishCount){
                        wishCount++;
                        $('.yith-wcwl-items-count').html(wishCount);
                    }
                }
                $(document).trigger( 'yith_wcwl_init_after_ajax' );
            }).fail(function(){
                // console.log('Something went wrong, please try again.');
                self.find('.btn-icon').removeClass('woodlyicon-rotate-right woodly-icon-loading').html('');
                self.find('.btn-icon').addClass('text-red woodlyicon-close-circle');
                setTimeout(function(){
                    self.find('.btn-icon').removeClass('text-red woodlyicon-close-circle').html('');
                    self.find('.btn-icon').addClass('icon-heart1');
                }, 1000);
            });
        });
        
        function retrieve_fragments( search ) {
            var options = {},
                fragments = null;
    
            if( search ){
                if( typeof search === 'object' ){
                    search = $.extend( {
                        fragments: null,
                        s: '',
                        container: $(document),
                        firstLoad: false
                    }, search );
    
                    if( ! search.fragments ) {
                        fragments = search.container.find('.wishlist-fragment');
                    } else {
                        fragments = search.fragments;
                    }
    
                    if( search.s ){
                        fragments = fragments.not('[data-fragment-ref]').add(fragments.filter('[data-fragment-ref="' + search.s + '"]'));
                    }
    
                    if( search.firstLoad ){
                        fragments = fragments.filter( '.on-first-load' );
                    }
                }
                else {
                    fragments = $('.wishlist-fragment');
    
                    if (typeof search === 'string' || typeof search === 'number') {
                        fragments = fragments.not('[data-fragment-ref]').add(fragments.filter('[data-fragment-ref="' + search + '"]'));
                    }
                }
            }
            else{
                fragments = $('.wishlist-fragment');
            }
    
            if ( fragments.length ) {
                fragments.each( function () {
                    var t = $( this ),
                        id = t.attr( 'class' ).split( ' ' ).filter( ( val ) => {
                            return val.length && val !== 'exists';
                        } ).join( yith_wcwl_l10n.fragments_index_glue );
    
                    options[ id ] = t.data( 'fragment-options' );
                } );
            } else {
                return null;
            }
    
            return options;
        }


    $('.category-wrapper select').niceSelect();




        
});
})(jQuery);


jQuery(document).ready(function ($) {

	(function ($) { 
		$('.xpc-tab ul.xpc-tabs').addClass('active').find('> li:eq(0)').addClass('current');
		
		$('.xpc-tab ul.xpc-tabs li a').click(function (g) { 
			var tab = $(this).closest('.xpc-tab'), 
				index = $(this).closest('li').index();
			
			tab.find('ul.xpc-tabs > li').removeClass('current');
			$(this).closest('li').addClass('current');
			
			tab.find('.xpc-tab_content').find('div.xpc-tabs_item').not('div.xpc-tabs_item:eq(' + index + ')').slideUp();
			tab.find('.xpc-tab_content').find('div.xpc-tabs_item:eq(' + index + ')').slideDown();
			
			g.preventDefault();
		} );
	})(jQuery);

});
