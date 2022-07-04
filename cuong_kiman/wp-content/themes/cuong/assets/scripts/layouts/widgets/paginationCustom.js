
$(document).ready( function(){
    innitPagination();
} )

const innitPagination = ()=>{
    let totalPages = 100;
    $('#pagination-container').twbsPagination({
        totalPages: totalPages,
        visiblePages: 4,
        next: '<i class="fas fa-angle-right">',
        first: '<i class="fas fa-angle-double-left"></i>',
        prev: '<i class="fas fa-angle-left"></i>',
        last: '<i class="fas fa-angle-double-right"></i>',
        onPageClick: async function (event, page) {

        }
    });
}

