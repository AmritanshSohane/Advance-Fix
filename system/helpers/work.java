public class work { 
    int data;
    work left;
    work right;
    public work(int da, work le, work ri) {
        int data=da;
        work left=le;
        work right=ri;
    }
    public static void main(String[] args) {
        work wo1=new work(1,null,null);
        work wo2=new work(2,null,null);
        work wo3=new work(3,null,null);
        work wo4=new work(4,wo1,null);
        work wo5=new work(5,wo2,wo3);
        work wo6=new work(6,wo4,wo3);
        work wo7=new work(7,wo6,wo5);
        recur(wo7);
    } 
    public static void recur(work w1){
        if(w1.left==null&&w1.right==null){
            return;
        }else{
            System.out.println(w1.data);
        }
    }
}