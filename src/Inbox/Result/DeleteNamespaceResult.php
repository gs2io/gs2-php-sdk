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

namespace Gs2\Inbox\Result;

use Gs2\Core\Model\IResult;
use Gs2\Inbox\Model\Namespace_;

/**
 * ネームスペースを削除 のレスポンスモデル
 *
 * @author Game Server Services, Inc.
 */
class DeleteNamespaceResult implements IResult {
	/** @var Namespace_ 削除したネームスペース */
	private $item;

	/**
	 * 削除したネームスペースを取得
	 *
	 * @return Namespace_|null ネームスペースを削除
	 */
	public function getItem(): ?Namespace_ {
		return $this->item;
	}

	/**
	 * 削除したネームスペースを設定
	 *
	 * @param Namespace_|null $item ネームスペースを削除
	 */
	public function setItem(?Namespace_ $item) {
		$this->item = $item;
	}

    public static function fromJson(array $data): DeleteNamespaceResult {
        $result = new DeleteNamespaceResult();
        $result->setItem(isset($data["item"]) ? Namespace_::fromJson($data["item"]) : null);
        return $result;
    }
}