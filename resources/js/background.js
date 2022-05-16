export default function backgroundCanvas(){
    const fps = 30
    let canvas = document.createElement('canvas')
    document.body.append(canvas)
    canvas.classList.add('backgroundCanvas')
    const resizeCanvas = ()=>{
        canvas.width = window.innerWidth
        canvas.height = window.innerHeight
        console.log("resize")
    }
    resizeCanvas()
    window.addEventListener('resize', resizeCanvas)

    let imgs = []
    function genLeaf(opacity = 0.3, color = "f55593" ){
        let index = imgs.push(new Image()) - 1
        imgs[index].src = `data:image/svg+xml,%3Csvg id='leaf' width='45' height='45' style="opacity:${opacity}" viewBox='0 0 120 120' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath style='opacity:1;fill:%23${color};fill-opacity:1;stroke:%23${color};stroke-width:.3;stroke-linecap:butt;stroke-linejoin:miter;stroke-miterlimit:4;stroke-dasharray:none;stroke-opacity:1' d='M53.1 58.9s-9.3 13.2.5 14.7c9.7 1.4 8.8-6.3 8.8-6.3s.4-1-3.7-8.1z' transform='translate(-116.8 -116.3) scale(3.15017)'%3E%3C/path%3E%3Cpath style='fill:%23${color};fill-opacity:1;stroke:%23${color};stroke-width:.3;stroke-linecap:butt;stroke-linejoin:miter;stroke-miterlimit:4;stroke-dasharray:none;stroke-opacity:1' d='M53.5 53.3s-13.3-9.3-14.8.5c-1.4 9.7 6.3 8.8 6.3 8.8s1.1 0 8.1-3.7z' transform='translate(-116.8 -116.3) scale(3.15017)'%3E%3C/path%3E%3Cpath style='fill:%23${color};fill-opacity:1;stroke:%23${color};stroke-width:.3;stroke-linecap:butt;stroke-linejoin:miter;stroke-miterlimit:4;stroke-dasharray:none;stroke-opacity:1' d='M59 53.6s9.3-13.2-.5-14.7c-9.7-1.4-8.7 6.3-8.7 6.3s-.8 1 3.7 8.1zM58.7 59.2s13.2 9.3 14.7-.5C74.8 49 67 50 67 50s-1-.7-8.1 3.7z' transform='translate(-116.8 -116.3) scale(3.15017)'%3E%3C/path%3E%3Cpath style='opacity:1;fill:%23${color};fill-opacity:1;stroke:%23${color};stroke-width:.331228;stroke-miterlimit:4;stroke-dasharray:none;stroke-opacity:1' d='M53.2 53h6v6.1h-6z' transform='translate(-116.8 -116.3) scale(3.15017)'%3E%3C/path%3E%3C/svg%3E`
        return index
    }
    imgs.push(genLeaf())

    class Leaf{
        constructor(ctx, img, env, index){
            this.img = img
            this.ctx = ctx
            this.vx = Math.random() * 1.3
            this.vy = -(Math.random() * 1.3)
            this.isImgIndex = !isNaN(this.img)
            this.size = 100 * (Math.random() + 0.3);
            this.x = ( this.size + 20 + (Math.random()*canvas.width)-canvas.width*.3 )
            this.y = Math.random() * canvas.height + canvas.height * .3
            this.env = env
            this.index = index
            this.ax = 1
            this.ay = 1
            this.angle = 0
            this.opacity = 0;
            let maxRotate = 0.8
            this.vr = Math.random() < 0.5 ? Math.random() * maxRotate : -(Math.random() * maxRotate);
        }

        update(){
            this.vx*=this.ax
            this.vy*=this.ay
            this.x+=this.vx
            this.y+=this.vy
            this.opacity+=0.006
            if(this.x > canvas.width || this.y < 0-this.size-20){
                this.env[this.index] = new Leaf(this.ctx, 0, this.env, this.index)
            }
            this.ctx.save()
            this.ctx.globalAlpha = this.opacity < 1 ? this.opacity : 1
            this.ctx.translate(this.x+(this.size/2), this.y+(this.size/2), )
            this.angle+=this.vr * Math.PI/360
            this.ctx.rotate(this.angle)
        }
        render(){
            this.update()
            this.ctx.drawImage(this.isImgIndex ? imgs[this.img] : this.img, 0-this.size/2, 0-this.size/2, this.size, this.size)
            this.ctx.restore()
        }
    }
    function main(){
        let ctx = canvas.getContext('2d')
        let leafs = []
        for(let i=0;i<10;i++){
            leafs.push(new Leaf(ctx, 0, leafs, leafs.length))
        }
        const animate = () => {
            ctx.clearRect(0,0,canvas.width, canvas.height)
            leafs.forEach( item => item.render())
            setTimeout( ()=>{ requestAnimationFrame(animate) }, 1000/fps )
        }
        animate()
    }
    main()
}
