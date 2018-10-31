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

namespace Gs2\Matchmaking\Control;
use Gs2\Matchmaking\Model\PasscodeGathering;

/**
 * @author Game Server Services, Inc.
 */
class PasscodeJoinGatheringResult {

	/** @var PasscodeGathering Passcodeマッチメイキング ギャザリング */
	private $item;

    public function __construct(array $array)
    {
        if(isset($array['item'])) {
            $this->item = PasscodeGathering::build($array['item']);
        }
    }

	/**
	 * Passcodeマッチメイキング ギャザリングを取得
	 *
	 * @return PasscodeGathering Passcodeマッチメイキング ギャザリング
	 */
	public function getItem() {
		return $this->item;
	}

	/**
	 * Passcodeマッチメイキング ギャザリングを設定
	 *
	 * @param PasscodeGathering $item Passcodeマッチメイキング ギャザリング
	 */
	public function setItem($item) {
		$this->item = $item;
	}
}