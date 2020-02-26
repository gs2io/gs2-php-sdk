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

namespace Gs2\Deploy\Result;

use Gs2\Core\Model\IResult;
use Gs2\Deploy\Model\Resource_;

/**
 * 作成されたのリソースを取得 のレスポンスモデル
 *
 * @author Game Server Services, Inc.
 */
class GetResourceResult implements IResult {
	/** @var Resource_ 作成されたのリソース */
	private $item;

	/**
	 * 作成されたのリソースを取得
	 *
	 * @return Resource_|null 作成されたのリソースを取得
	 */
	public function getItem(): ?Resource_ {
		return $this->item;
	}

	/**
	 * 作成されたのリソースを設定
	 *
	 * @param Resource_|null $item 作成されたのリソースを取得
	 */
	public function setItem(?Resource_ $item) {
		$this->item = $item;
	}

    public static function fromJson(array $data): GetResourceResult {
        $result = new GetResourceResult();
        $result->setItem(isset($data["item"]) ? Resource_::fromJson($data["item"]) : null);
        return $result;
    }
}