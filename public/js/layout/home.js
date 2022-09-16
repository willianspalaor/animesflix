class App{

	constructor() {
		this.self = this;
	}

	start(){
		Card.bindEvents();
	}

}

$(function(){
	(new App()).start();
});
