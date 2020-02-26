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

namespace Gs2\Datastore\Model;

use Gs2\Core\Model\IModel;

/**
 * データオブジェクト履歴
 *
 * @author Game Server Services, Inc.
 *
 */
class DataObjectHistory implements IModel {
	/**
     * @var string データオブジェクト履歴
	 */
	protected $dataObjectHistoryId;

	/**
	 * データオブジェクト履歴を取得
	 *
	 * @return string|null データオブジェクト履歴
	 */
	public function getDataObjectHistoryId(): ?string {
		return $this->dataObjectHistoryId;
	}

	/**
	 * データオブジェクト履歴を設定
	 *
	 * @param string|null $dataObjectHistoryId データオブジェクト履歴
	 */
	public function setDataObjectHistoryId(?string $dataObjectHistoryId) {
		$this->dataObjectHistoryId = $dataObjectHistoryId;
	}

	/**
	 * データオブジェクト履歴を設定
	 *
	 * @param string|null $dataObjectHistoryId データオブジェクト履歴
	 * @return DataObjectHistory $this
	 */
	public function withDataObjectHistoryId(?string $dataObjectHistoryId): DataObjectHistory {
		$this->dataObjectHistoryId = $dataObjectHistoryId;
		return $this;
	}
	/**
     * @var string データオブジェクト名
	 */
	protected $dataObjectName;

	/**
	 * データオブジェクト名を取得
	 *
	 * @return string|null データオブジェクト名
	 */
	public function getDataObjectName(): ?string {
		return $this->dataObjectName;
	}

	/**
	 * データオブジェクト名を設定
	 *
	 * @param string|null $dataObjectName データオブジェクト名
	 */
	public function setDataObjectName(?string $dataObjectName) {
		$this->dataObjectName = $dataObjectName;
	}

	/**
	 * データオブジェクト名を設定
	 *
	 * @param string|null $dataObjectName データオブジェクト名
	 * @return DataObjectHistory $this
	 */
	public function withDataObjectName(?string $dataObjectName): DataObjectHistory {
		$this->dataObjectName = $dataObjectName;
		return $this;
	}
	/**
     * @var string 世代ID
	 */
	protected $generation;

	/**
	 * 世代IDを取得
	 *
	 * @return string|null 世代ID
	 */
	public function getGeneration(): ?string {
		return $this->generation;
	}

	/**
	 * 世代IDを設定
	 *
	 * @param string|null $generation 世代ID
	 */
	public function setGeneration(?string $generation) {
		$this->generation = $generation;
	}

	/**
	 * 世代IDを設定
	 *
	 * @param string|null $generation 世代ID
	 * @return DataObjectHistory $this
	 */
	public function withGeneration(?string $generation): DataObjectHistory {
		$this->generation = $generation;
		return $this;
	}
	/**
     * @var int データサイズ
	 */
	protected $contentLength;

	/**
	 * データサイズを取得
	 *
	 * @return int|null データサイズ
	 */
	public function getContentLength(): ?int {
		return $this->contentLength;
	}

	/**
	 * データサイズを設定
	 *
	 * @param int|null $contentLength データサイズ
	 */
	public function setContentLength(?int $contentLength) {
		$this->contentLength = $contentLength;
	}

	/**
	 * データサイズを設定
	 *
	 * @param int|null $contentLength データサイズ
	 * @return DataObjectHistory $this
	 */
	public function withContentLength(?int $contentLength): DataObjectHistory {
		$this->contentLength = $contentLength;
		return $this;
	}
	/**
     * @var int 作成日時
	 */
	protected $createdAt;

	/**
	 * 作成日時を取得
	 *
	 * @return int|null 作成日時
	 */
	public function getCreatedAt(): ?int {
		return $this->createdAt;
	}

	/**
	 * 作成日時を設定
	 *
	 * @param int|null $createdAt 作成日時
	 */
	public function setCreatedAt(?int $createdAt) {
		$this->createdAt = $createdAt;
	}

	/**
	 * 作成日時を設定
	 *
	 * @param int|null $createdAt 作成日時
	 * @return DataObjectHistory $this
	 */
	public function withCreatedAt(?int $createdAt): DataObjectHistory {
		$this->createdAt = $createdAt;
		return $this;
	}

    public function toJson(): array {
        return array(
            "dataObjectHistoryId" => $this->dataObjectHistoryId,
            "dataObjectName" => $this->dataObjectName,
            "generation" => $this->generation,
            "contentLength" => $this->contentLength,
            "createdAt" => $this->createdAt,
        );
    }

    public static function fromJson(array $data): DataObjectHistory {
        $model = new DataObjectHistory();
        $model->setDataObjectHistoryId(isset($data["dataObjectHistoryId"]) ? $data["dataObjectHistoryId"] : null);
        $model->setDataObjectName(isset($data["dataObjectName"]) ? $data["dataObjectName"] : null);
        $model->setGeneration(isset($data["generation"]) ? $data["generation"] : null);
        $model->setContentLength(isset($data["contentLength"]) ? $data["contentLength"] : null);
        $model->setCreatedAt(isset($data["createdAt"]) ? $data["createdAt"] : null);
        return $model;
    }
}