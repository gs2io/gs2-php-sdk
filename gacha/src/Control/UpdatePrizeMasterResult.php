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

namespace Gs2\Gacha\Control;
use Gs2\Gacha\Model\PrizeMaster;

/**
 * @author Game Server Services, Inc.
 */
class UpdatePrizeMasterResult {

	/** @var PrizeMaster 景品 */
	private $item;

    public function __construct(array $array)
    {
        if(isset($array['item'])) {
            $this->item = PrizeMaster::build($array['item']);
        }
    }

	/**
	 * 景品を取得
	 *
	 * @return PrizeMaster 景品
	 */
	public function getItem() {
		return $this->item;
	}

	/**
	 * 景品を設定
	 *
	 * @param PrizeMaster $item 景品
	 */
	public function setItem($item) {
		$this->item = $item;
	}
}