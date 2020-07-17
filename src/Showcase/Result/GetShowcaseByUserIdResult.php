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

namespace Gs2\Showcase\Result;

use Gs2\Core\Model\IResult;
use Gs2\Showcase\Model\Showcase;

/**
 * ユーザIDを指定して陳列棚を取得 のレスポンスモデル
 *
 * @author Game Server Services, Inc.
 */
class GetShowcaseByUserIdResult implements IResult {
	/** @var Showcase 陳列棚 */
	private $item;

	/**
	 * 陳列棚を取得
	 *
	 * @return Showcase|null ユーザIDを指定して陳列棚を取得
	 */
	public function getItem(): ?Showcase {
		return $this->item;
	}

	/**
	 * 陳列棚を設定
	 *
	 * @param Showcase|null $item ユーザIDを指定して陳列棚を取得
	 */
	public function setItem(?Showcase $item) {
		$this->item = $item;
	}

    public static function fromJson(array $data): GetShowcaseByUserIdResult {
        $result = new GetShowcaseByUserIdResult();
        $result->setItem(isset($data["item"]) ? Showcase::fromJson($data["item"]) : null);
        return $result;
    }
}