function nextJump(carousel){
	if(carousel.visibleItems[carousel.visibleItems.length-1] +1 < carousel.itemsAmount) {
		next = carousel.visibleItems[carousel.visibleItems.length-1] + 1;
	} else {
		next = 0;
	}
	return next;
}

function prevJump(carousel){
	if(carousel.visibleItems[0] > 0) {
		prev = carousel.visibleItems[0] - carousel.itemsAmount ;
	} else {
		prev = carousel.visibleItems[carousel.visibleItems.length-1];
	}
	return prev;
}