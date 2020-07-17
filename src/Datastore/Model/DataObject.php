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
 * データオブジェクト
 *
 * @author Game Server Services, Inc.
 *
 */
class DataObject implements IModel {
	/**
     * @var string データオブジェクト
	 */
	protected $dataObjectId;

	/**
	 * データオブジェクトを取得
	 *
	 * @return string|null データオブジェクト
	 */
	public function getDataObjectId(): ?string {
		return $this->dataObjectId;
	}

	/**
	 * データオブジェクトを設定
	 *
	 * @param string|null $dataObjectId データオブジェクト
	 */
	public function setDataObjectId(?string $dataObjectId) {
		$this->dataObjectId = $dataObjectId;
	}

	/**
	 * データオブジェクトを設定
	 *
	 * @param string|null $dataObjectId データオブジェクト
	 * @return DataObject $this
	 */
	public function withDataObjectId(?string $dataObjectId): DataObject {
		$this->dataObjectId = $dataObjectId;
		return $this;
	}
	/**
     * @var string データの名前
	 */
	protected $name;

	/**
	 * データの名前を取得
	 *
	 * @return string|null データの名前
	 */
	public function getName(): ?string {
		return $this->name;
	}

	/**
	 * データの名前を設定
	 *
	 * @param string|null $name データの名前
	 */
	public function setName(?string $name) {
		$this->name = $name;
	}

	/**
	 * データの名前を設定
	 *
	 * @param string|null $name データの名前
	 * @return DataObject $this
	 */
	public function withName(?string $name): DataObject {
		$this->name = $name;
		return $this;
	}
	/**
     * @var string ユーザーID
	 */
	protected $userId;

	/**
	 * ユーザーIDを取得
	 *
	 * @return string|null ユーザーID
	 */
	public function getUserId(): ?string {
		return $this->userId;
	}

	/**
	 * ユーザーIDを設定
	 *
	 * @param string|null $userId ユーザーID
	 */
	public function setUserId(?string $userId) {
		$this->userId = $userId;
	}

	/**
	 * ユーザーIDを設定
	 *
	 * @param string|null $userId ユーザーID
	 * @return DataObject $this
	 */
	public function withUserId(?string $userId): DataObject {
		$this->userId = $userId;
		return $this;
	}
	/**
     * @var string ファイルのアクセス権
	 */
	protected $scope;

	/**
	 * ファイルのアクセス権を取得
	 *
	 * @return string|null ファイルのアクセス権
	 */
	public function getScope(): ?string {
		return $this->scope;
	}

	/**
	 * ファイルのアクセス権を設定
	 *
	 * @param string|null $scope ファイルのアクセス権
	 */
	public function setScope(?string $scope) {
		$this->scope = $scope;
	}

	/**
	 * ファイルのアクセス権を設定
	 *
	 * @param string|null $scope ファイルのアクセス権
	 * @return DataObject $this
	 */
	public function withScope(?string $scope): DataObject {
		$this->scope = $scope;
		return $this;
	}
	/**
     * @var string[] 公開するユーザIDリスト
	 */
	protected $allowUserIds;

	/**
	 * 公開するユーザIDリストを取得
	 *
	 * @return string[]|null 公開するユーザIDリスト
	 */
	public function getAllowUserIds(): ?array {
		return $this->allowUserIds;
	}

	/**
	 * 公開するユーザIDリストを設定
	 *
	 * @param string[]|null $allowUserIds 公開するユーザIDリスト
	 */
	public function setAllowUserIds(?array $allowUserIds) {
		$this->allowUserIds = $allowUserIds;
	}

	/**
	 * 公開するユーザIDリストを設定
	 *
	 * @param string[]|null $allowUserIds 公開するユーザIDリスト
	 * @return DataObject $this
	 */
	public function withAllowUserIds(?array $allowUserIds): DataObject {
		$this->allowUserIds = $allowUserIds;
		return $this;
	}
	/**
     * @var string プラットフォーム
	 */
	protected $platform;

	/**
	 * プラットフォームを取得
	 *
	 * @return string|null プラットフォーム
	 */
	public function getPlatform(): ?string {
		return $this->platform;
	}

	/**
	 * プラットフォームを設定
	 *
	 * @param string|null $platform プラットフォーム
	 */
	public function setPlatform(?string $platform) {
		$this->platform = $platform;
	}

	/**
	 * プラットフォームを設定
	 *
	 * @param string|null $platform プラットフォーム
	 * @return DataObject $this
	 */
	public function withPlatform(?string $platform): DataObject {
		$this->platform = $platform;
		return $this;
	}
	/**
     * @var string 状態
	 */
	protected $status;

	/**
	 * 状態を取得
	 *
	 * @return string|null 状態
	 */
	public function getStatus(): ?string {
		return $this->status;
	}

	/**
	 * 状態を設定
	 *
	 * @param string|null $status 状態
	 */
	public function setStatus(?string $status) {
		$this->status = $status;
	}

	/**
	 * 状態を設定
	 *
	 * @param string|null $status 状態
	 * @return DataObject $this
	 */
	public function withStatus(?string $status): DataObject {
		$this->status = $status;
		return $this;
	}
	/**
     * @var string データの世代
	 */
	protected $generation;

	/**
	 * データの世代を取得
	 *
	 * @return string|null データの世代
	 */
	public function getGeneration(): ?string {
		return $this->generation;
	}

	/**
	 * データの世代を設定
	 *
	 * @param string|null $generation データの世代
	 */
	public function setGeneration(?string $generation) {
		$this->generation = $generation;
	}

	/**
	 * データの世代を設定
	 *
	 * @param string|null $generation データの世代
	 * @return DataObject $this
	 */
	public function withGeneration(?string $generation): DataObject {
		$this->generation = $generation;
		return $this;
	}
	/**
     * @var string 以前有効だったデータの世代
	 */
	protected $previousGeneration;

	/**
	 * 以前有効だったデータの世代を取得
	 *
	 * @return string|null 以前有効だったデータの世代
	 */
	public function getPreviousGeneration(): ?string {
		return $this->previousGeneration;
	}

	/**
	 * 以前有効だったデータの世代を設定
	 *
	 * @param string|null $previousGeneration 以前有効だったデータの世代
	 */
	public function setPreviousGeneration(?string $previousGeneration) {
		$this->previousGeneration = $previousGeneration;
	}

	/**
	 * 以前有効だったデータの世代を設定
	 *
	 * @param string|null $previousGeneration 以前有効だったデータの世代
	 * @return DataObject $this
	 */
	public function withPreviousGeneration(?string $previousGeneration): DataObject {
		$this->previousGeneration = $previousGeneration;
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
	 * @return DataObject $this
	 */
	public function withCreatedAt(?int $createdAt): DataObject {
		$this->createdAt = $createdAt;
		return $this;
	}
	/**
     * @var int 最終更新日時
	 */
	protected $updatedAt;

	/**
	 * 最終更新日時を取得
	 *
	 * @return int|null 最終更新日時
	 */
	public function getUpdatedAt(): ?int {
		return $this->updatedAt;
	}

	/**
	 * 最終更新日時を設定
	 *
	 * @param int|null $updatedAt 最終更新日時
	 */
	public function setUpdatedAt(?int $updatedAt) {
		$this->updatedAt = $updatedAt;
	}

	/**
	 * 最終更新日時を設定
	 *
	 * @param int|null $updatedAt 最終更新日時
	 * @return DataObject $this
	 */
	public function withUpdatedAt(?int $updatedAt): DataObject {
		$this->updatedAt = $updatedAt;
		return $this;
	}

    public function toJson(): array {
        return array(
            "dataObjectId" => $this->dataObjectId,
            "name" => $this->name,
            "userId" => $this->userId,
            "scope" => $this->scope,
            "allowUserIds" => $this->allowUserIds,
            "platform" => $this->platform,
            "status" => $this->status,
            "generation" => $this->generation,
            "previousGeneration" => $this->previousGeneration,
            "createdAt" => $this->createdAt,
            "updatedAt" => $this->updatedAt,
        );
    }

    public static function fromJson(array $data): DataObject {
        $model = new DataObject();
        $model->setDataObjectId(isset($data["dataObjectId"]) ? $data["dataObjectId"] : null);
        $model->setName(isset($data["name"]) ? $data["name"] : null);
        $model->setUserId(isset($data["userId"]) ? $data["userId"] : null);
        $model->setScope(isset($data["scope"]) ? $data["scope"] : null);
        $model->setAllowUserIds(isset($data["allowUserIds"]) ? $data["allowUserIds"] : null);
        $model->setPlatform(isset($data["platform"]) ? $data["platform"] : null);
        $model->setStatus(isset($data["status"]) ? $data["status"] : null);
        $model->setGeneration(isset($data["generation"]) ? $data["generation"] : null);
        $model->setPreviousGeneration(isset($data["previousGeneration"]) ? $data["previousGeneration"] : null);
        $model->setCreatedAt(isset($data["createdAt"]) ? $data["createdAt"] : null);
        $model->setUpdatedAt(isset($data["updatedAt"]) ? $data["updatedAt"] : null);
        return $model;
    }
}