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

namespace Gs2\Version\Result;

use Gs2\Core\Model\IResult;
use Gs2\Version\Model\AcceptVersion;

/**
 * ユーザーIDを指定して承認したバージョンを取得 のレスポンスモデル
 *
 * @author Game Server Services, Inc.
 */
class GetAcceptVersionByUserIdResult implements IResult {
	/** @var AcceptVersion 承認したバージョン */
	private $item;

	/**
	 * 承認したバージョンを取得
	 *
	 * @return AcceptVersion|null ユーザーIDを指定して承認したバージョンを取得
	 */
	public function getItem(): ?AcceptVersion {
		return $this->item;
	}

	/**
	 * 承認したバージョンを設定
	 *
	 * @param AcceptVersion|null $item ユーザーIDを指定して承認したバージョンを取得
	 */
	public function setItem(?AcceptVersion $item) {
		$this->item = $item;
	}

    public static function fromJson(array $data): GetAcceptVersionByUserIdResult {
        $result = new GetAcceptVersionByUserIdResult();
        $result->setItem(isset($data["item"]) ? AcceptVersion::fromJson($data["item"]) : null);
        return $result;
    }
}