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
use Gs2\Friend\Model\PublicProfile;

/**
 * 公開プロフィールを取得 のレスポンスモデル
 *
 * @author Game Server Services, Inc.
 */
class GetPublicProfileResult implements IResult {
	/** @var PublicProfile 公開プロフィール */
	private $item;

	/**
	 * 公開プロフィールを取得
	 *
	 * @return PublicProfile|null 公開プロフィールを取得
	 */
	public function getItem(): ?PublicProfile {
		return $this->item;
	}

	/**
	 * 公開プロフィールを設定
	 *
	 * @param PublicProfile|null $item 公開プロフィールを取得
	 */
	public function setItem(?PublicProfile $item) {
		$this->item = $item;
	}

    public static function fromJson(array $data): GetPublicProfileResult {
        $result = new GetPublicProfileResult();
        $result->setItem(isset($data["item"]) ? PublicProfile::fromJson($data["item"]) : null);
        return $result;
    }
}