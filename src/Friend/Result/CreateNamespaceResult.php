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
use Gs2\Friend\Model\Namespace_;

/**
 * ネームスペースを新規作成 のレスポンスモデル
 *
 * @author Game Server Services, Inc.
 */
class CreateNamespaceResult implements IResult {
	/** @var Namespace_ 作成したネームスペース */
	private $item;

	/**
	 * 作成したネームスペースを取得
	 *
	 * @return Namespace_|null ネームスペースを新規作成
	 */
	public function getItem(): ?Namespace_ {
		return $this->item;
	}

	/**
	 * 作成したネームスペースを設定
	 *
	 * @param Namespace_|null $item ネームスペースを新規作成
	 */
	public function setItem(?Namespace_ $item) {
		$this->item = $item;
	}

    public static function fromJson(array $data): CreateNamespaceResult {
        $result = new CreateNamespaceResult();
        $result->setItem(isset($data["item"]) ? Namespace_::fromJson($data["item"]) : null);
        return $result;
    }
}