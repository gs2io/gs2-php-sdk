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

namespace Gs2\Money\Control;
use Gs2\Money\Model\Wallet;

/**
 * @author Game Server Services, Inc.
 */
class GetWalletDetailResult {

	/** @var Wallet[] ウォレットの詳細 */
	private $items;

    public function __construct(array $array)
    {
        if(isset($array['items'])) {
            $this->items = [];
            foreach($array['items'] as $arr)
            {
                array_push($this->items, Wallet::build($arr));
            }
        }
    }

	/**
	 * ウォレットの詳細を取得
	 *
	 * @return Wallet[] ウォレットの詳細
	 */
	public function getItems() {
		return $this->items;
	}

	/**
	 * ウォレットの詳細を設定
	 *
	 * @param Wallet[] $items ウォレットの詳細
	 */
	public function setItems($items) {
		$this->items = $items;
	}
}