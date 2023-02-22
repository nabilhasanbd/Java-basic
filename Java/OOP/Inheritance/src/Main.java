public class Main {
    public static void main(String[] args) {

        ColoredRectangle rectangle1 = new ColoredRectangle();
        System.out.println(rectangle1.getArea()); //Calling parent function
        System.out.println(rectangle1.getPeriphery()); //Calling child function
        System.out.println(rectangle1.getColor()); //Calling child function
    }
}
