<?php
/*
 * Copyright 2016 Game Server Services, Inc. or its affiliates. All Rights
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

namespace Gs2\Enhance\Result;

use Gs2\Core\Model\IResult;
use Gs2\Enhance\Model\Progress;

/**
 * 強化実行を取得 のレスポンスモデル
 *
 * @author Game Server Services, Inc.
 */
class DeleteProgressResult implements IResult {
	/** @var Progress 強化実行 */
	private $item;

	/**
	 * 強化実行を取得
	 *
	 * @return Progress|null 強化実行を取得
	 */
	public function getItem(): ?Progress {
		return $this->item;
	}

	/**
	 * 強化実行を設定
	 *
	 * @param Progress|null $item 強化実行を取得
	 */
	public function setItem(?Progress $item) {
		$this->item = $item;
	}

    public static function fromJson(array $data): DeleteProgressResult {
        $result = new DeleteProgressResult();
        $result->setItem(isset($data["item"]) ? Progress::fromJson($data["item"]) : null);
        return $result;
    }
}