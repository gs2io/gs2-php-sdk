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
 * ユーザIDを指定してデータオブジェクトを世代を指定してダウンロード準備する のレスポンスモデル
 *
 * @author Game Server Services, Inc.
 */
class PrepareDownloadByUserIdAndDataObjectNameAndGenerationResult implements IResult {
	/** @var DataObject データオブジェクト */
	private $item;
	/** @var string ファイルをダウンロードするためのURL */
	private $fileUrl;
	/** @var int ファイルの容量 */
	private $contentLength;

	/**
	 * データオブジェクトを取得
	 *
	 * @return DataObject|null ユーザIDを指定してデータオブジェクトを世代を指定してダウンロード準備する
	 */
	public function getItem(): ?DataObject {
		return $this->item;
	}

	/**
	 * データオブジェクトを設定
	 *
	 * @param DataObject|null $item ユーザIDを指定してデータオブジェクトを世代を指定してダウンロード準備する
	 */
	public function setItem(?DataObject $item) {
		$this->item = $item;
	}

	/**
	 * ファイルをダウンロードするためのURLを取得
	 *
	 * @return string|null ユーザIDを指定してデータオブジェクトを世代を指定してダウンロード準備する
	 */
	public function getFileUrl(): ?string {
		return $this->fileUrl;
	}

	/**
	 * ファイルをダウンロードするためのURLを設定
	 *
	 * @param string|null $fileUrl ユーザIDを指定してデータオブジェクトを世代を指定してダウンロード準備する
	 */
	public function setFileUrl(?string $fileUrl) {
		$this->fileUrl = $fileUrl;
	}

	/**
	 * ファイルの容量を取得
	 *
	 * @return int|null ユーザIDを指定してデータオブジェクトを世代を指定してダウンロード準備する
	 */
	public function getContentLength(): ?int {
		return $this->contentLength;
	}

	/**
	 * ファイルの容量を設定
	 *
	 * @param int|null $contentLength ユーザIDを指定してデータオブジェクトを世代を指定してダウンロード準備する
	 */
	public function setContentLength(?int $contentLength) {
		$this->contentLength = $contentLength;
	}

    public static function fromJson(array $data): PrepareDownloadByUserIdAndDataObjectNameAndGenerationResult {
        $result = new PrepareDownloadByUserIdAndDataObjectNameAndGenerationResult();
        $result->setItem(isset($data["item"]) ? DataObject::fromJson($data["item"]) : null);
        $result->setFileUrl(isset($data["fileUrl"]) ? $data["fileUrl"] : null);
        $result->setContentLength(isset($data["contentLength"]) ? $data["contentLength"] : null);
        return $result;
    }
}