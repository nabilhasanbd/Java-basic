public class ColoredRectangle extends Rectangle {
    private String color = "Green";

    public String getColor() {
        return color;
    }

    public void setColor(String color){
        this.color = color;
    }

    public float getPeriphery(){
        return height*width*2 ;
    }
}
