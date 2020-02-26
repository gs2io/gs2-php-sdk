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

namespace Gs2\Friend\Result;

use Gs2\Core\Model\IResult;
use Gs2\Friend\Model\Profile;

/**
 * プロフィールを更新 のレスポンスモデル
 *
 * @author Game Server Services, Inc.
 */
class UpdateProfileResult implements IResult {
	/** @var Profile 更新したプロフィール */
	private $item;

	/**
	 * 更新したプロフィールを取得
	 *
	 * @return Profile|null プロフィールを更新
	 */
	public function getItem(): ?Profile {
		return $this->item;
	}

	/**
	 * 更新したプロフィールを設定
	 *
	 * @param Profile|null $item プロフィールを更新
	 */
	public function setItem(?Profile $item) {
		$this->item = $item;
	}

    public static function fromJson(array $data): UpdateProfileResult {
        $result = new UpdateProfileResult();
        $result->setItem(isset($data["item"]) ? Profile::fromJson($data["item"]) : null);
        return $result;
    }
}