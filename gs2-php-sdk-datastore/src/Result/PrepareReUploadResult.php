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

namespace Gs2\Datastore\Result;

use Gs2\Core\Model\IResult;
use Gs2\Datastore\Model\DataObject;

/**
 * データオブジェクトを再アップロード準備する のレスポンスモデル
 *
 * @author Game Server Services, Inc.
 */
class PrepareReUploadResult implements IResult {
	/** @var DataObject データオブジェクト */
	private $item;
	/** @var string アップロード処理の実行に使用するURL */
	private $uploadUrl;

	/**
	 * データオブジェクトを取得
	 *
	 * @return DataObject|null データオブジェクトを再アップロード準備する
	 */
	public function getItem(): ?DataObject {
		return $this->item;
	}

	/**
	 * データオブジェクトを設定
	 *
	 * @param DataObject|null $item データオブジェクトを再アップロード準備する
	 */
	public function setItem(?DataObject $item) {
		$this->item = $item;
	}

	/**
	 * アップロード処理の実行に使用するURLを取得
	 *
	 * @return string|null データオブジェクトを再アップロード準備する
	 */
	public function getUploadUrl(): ?string {
		return $this->uploadUrl;
	}

	/**
	 * アップロード処理の実行に使用するURLを設定
	 *
	 * @param string|null $uploadUrl データオブジェクトを再アップロード準備する
	 */
	public function setUploadUrl(?string $uploadUrl) {
		$this->uploadUrl = $uploadUrl;
	}

    public static function fromJson(array $data): PrepareReUploadResult {
        $result = new PrepareReUploadResult();
        $result->setItem(isset($data["item"]) ? DataObject::fromJson($data["item"]) : null);
        $result->setUploadUrl(isset($data["uploadUrl"]) ? $data["uploadUrl"] : null);
        return $result;
    }
}