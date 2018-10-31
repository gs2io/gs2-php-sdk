<?php
/*
 * Copyright 2016-2018 Game Server Services, Inc. or its affiliates. All Rights
 * Reserved.
 *
 * Licensed under the Apache License, Version 2.0 (the "License").
 * You may not use this file except in compliance with the License.
 * A copy of the License is located at
 *
 *  http://www.apache.org/licenses/LICENSE-2.0
 *
 * or in the "license" file accompanying this file. This file is distributed
 * on an "AS IS" BASIS, WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either
 * express or implied. See the License for the specific language governing
 * permissions and limitations under the License.
 */

namespace Gs2\Showcase\Control;
use Gs2\Showcase\Model\Item;
use Gs2\Showcase\Model\StampSheet;

/**
 * @author Game Server Services, Inc.
 */
class BuyItemResult {

	/** @var Item 商品 */
	private $item;

	/** @var StampSheet   */
	private $stampSheet;

    public function __construct(array $array)
    {
        if(isset($array['item'])) {
            $this->item = Item::build($array['item']);
        }
        if(isset($array['stampSheet'])) {
            $this->stampSheet = StampSheet::build($array['stampSheet']);
        }
    }

	/**
	 * 商品を取得
	 *
	 * @return Item 商品
	 */
	public function getItem() {
		return $this->item;
	}

	/**
	 * 商品を設定
	 *
	 * @param Item $item 商品
	 */
	public function setItem($item) {
		$this->item = $item;
	}

	/**
	 *  を取得
	 *
	 * @return StampSheet  
	 */
	public function getStampSheet() {
		return $this->stampSheet;
	}

	/**
	 *  を設定
	 *
	 * @param StampSheet $stampSheet  
	 */
	public function setStampSheet($stampSheet) {
		$this->stampSheet = $stampSheet;
	}
}