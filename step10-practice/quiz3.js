function Circle(radius) {
    this.radius = radius;
}

Circle.prototype.getDiameter = function() {
    return this.radius * 2;
}
Circle.prototype.getArea = function() {
    return this.radius * this.radius * Math.PI;
}
Circle.prototype.getCircumference = function() {
    return this.radius * 2 * Math.PI;
}