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

namespace Gs2\Deploy\Model;

use Gs2\Core\Model\IModel;

/**
 * 作成中のリソース
 *
 * @author Game Server Services, Inc.
 *
 */
class WorkingResource implements IModel {
	/**
     * @var string 作成中のリソース
	 */
	protected $resourceId;

	/**
	 * 作成中のリソースを取得
	 *
	 * @return string|null 作成中のリソース
	 */
	public function getResourceId(): ?string {
		return $this->resourceId;
	}

	/**
	 * 作成中のリソースを設定
	 *
	 * @param string|null $resourceId 作成中のリソース
	 */
	public function setResourceId(?string $resourceId) {
		$this->resourceId = $resourceId;
	}

	/**
	 * 作成中のリソースを設定
	 *
	 * @param string|null $resourceId 作成中のリソース
	 * @return WorkingResource $this
	 */
	public function withResourceId(?string $resourceId): WorkingResource {
		$this->resourceId = $resourceId;
		return $this;
	}
	/**
     * @var string 操作の種類
	 */
	protected $context;

	/**
	 * 操作の種類を取得
	 *
	 * @return string|null 操作の種類
	 */
	public function getContext(): ?string {
		return $this->context;
	}

	/**
	 * 操作の種類を設定
	 *
	 * @param string|null $context 操作の種類
	 */
	public function setContext(?string $context) {
		$this->context = $context;
	}

	/**
	 * 操作の種類を設定
	 *
	 * @param string|null $context 操作の種類
	 * @return WorkingResource $this
	 */
	public function withContext(?string $context): WorkingResource {
		$this->context = $context;
		return $this;
	}
	/**
     * @var string 操作対象のリソース
	 */
	protected $type;

	/**
	 * 操作対象のリソースを取得
	 *
	 * @return string|null 操作対象のリソース
	 */
	public function getType(): ?string {
		return $this->type;
	}

	/**
	 * 操作対象のリソースを設定
	 *
	 * @param string|null $type 操作対象のリソース
	 */
	public function setType(?string $type) {
		$this->type = $type;
	}

	/**
	 * 操作対象のリソースを設定
	 *
	 * @param string|null $type 操作対象のリソース
	 * @return WorkingResource $this
	 */
	public function withType(?string $type): WorkingResource {
		$this->type = $type;
		return $this;
	}
	/**
     * @var string 作成中のリソース名
	 */
	protected $name;

	/**
	 * 作成中のリソース名を取得
	 *
	 * @return string|null 作成中のリソース名
	 */
	public function getName(): ?string {
		return $this->name;
	}

	/**
	 * 作成中のリソース名を設定
	 *
	 * @param string|null $name 作成中のリソース名
	 */
	public function setName(?string $name) {
		$this->name = $name;
	}

	/**
	 * 作成中のリソース名を設定
	 *
	 * @param string|null $name 作成中のリソース名
	 * @return WorkingResource $this
	 */
	public function withName(?string $name): WorkingResource {
		$this->name = $name;
		return $this;
	}
	/**
     * @var string リクエストパラメータ
	 */
	protected $request;

	/**
	 * リクエストパラメータを取得
	 *
	 * @return string|null リクエストパラメータ
	 */
	public function getRequest(): ?string {
		return $this->request;
	}

	/**
	 * リクエストパラメータを設定
	 *
	 * @param string|null $request リクエストパラメータ
	 */
	public function setRequest(?string $request) {
		$this->request = $request;
	}

	/**
	 * リクエストパラメータを設定
	 *
	 * @param string|null $request リクエストパラメータ
	 * @return WorkingResource $this
	 */
	public function withRequest(?string $request): WorkingResource {
		$this->request = $request;
		return $this;
	}
	/**
     * @var string[] 依存しているリソースの名前
	 */
	protected $after;

	/**
	 * 依存しているリソースの名前を取得
	 *
	 * @return string[]|null 依存しているリソースの名前
	 */
	public function getAfter(): ?array {
		return $this->after;
	}

	/**
	 * 依存しているリソースの名前を設定
	 *
	 * @param string[]|null $after 依存しているリソースの名前
	 */
	public function setAfter(?array $after) {
		$this->after = $after;
	}

	/**
	 * 依存しているリソースの名前を設定
	 *
	 * @param string[]|null $after 依存しているリソースの名前
	 * @return WorkingResource $this
	 */
	public function withAfter(?array $after): WorkingResource {
		$this->after = $after;
		return $this;
	}
	/**
     * @var string ロールバック操作の種類
	 */
	protected $rollbackContext;

	/**
	 * ロールバック操作の種類を取得
	 *
	 * @return string|null ロールバック操作の種類
	 */
	public function getRollbackContext(): ?string {
		return $this->rollbackContext;
	}

	/**
	 * ロールバック操作の種類を設定
	 *
	 * @param string|null $rollbackContext ロールバック操作の種類
	 */
	public function setRollbackContext(?string $rollbackContext) {
		$this->rollbackContext = $rollbackContext;
	}

	/**
	 * ロールバック操作の種類を設定
	 *
	 * @param string|null $rollbackContext ロールバック操作の種類
	 * @return WorkingResource $this
	 */
	public function withRollbackContext(?string $rollbackContext): WorkingResource {
		$this->rollbackContext = $rollbackContext;
		return $this;
	}
	/**
     * @var string ロールバック用のリクエストパラメータ
	 */
	protected $rollbackRequest;

	/**
	 * ロールバック用のリクエストパラメータを取得
	 *
	 * @return string|null ロールバック用のリクエストパラメータ
	 */
	public function getRollbackRequest(): ?string {
		return $this->rollbackRequest;
	}

	/**
	 * ロールバック用のリクエストパラメータを設定
	 *
	 * @param string|null $rollbackRequest ロールバック用のリクエストパラメータ
	 */
	public function setRollbackRequest(?string $rollbackRequest) {
		$this->rollbackRequest = $rollbackRequest;
	}

	/**
	 * ロールバック用のリクエストパラメータを設定
	 *
	 * @param string|null $rollbackRequest ロールバック用のリクエストパラメータ
	 * @return WorkingResource $this
	 */
	public function withRollbackRequest(?string $rollbackRequest): WorkingResource {
		$this->rollbackRequest = $rollbackRequest;
		return $this;
	}
	/**
     * @var string[] ロールバック時に依存しているリソースの名前
	 */
	protected $rollbackAfter;

	/**
	 * ロールバック時に依存しているリソースの名前を取得
	 *
	 * @return string[]|null ロールバック時に依存しているリソースの名前
	 */
	public function getRollbackAfter(): ?array {
		return $this->rollbackAfter;
	}

	/**
	 * ロールバック時に依存しているリソースの名前を設定
	 *
	 * @param string[]|null $rollbackAfter ロールバック時に依存しているリソースの名前
	 */
	public function setRollbackAfter(?array $rollbackAfter) {
		$this->rollbackAfter = $rollbackAfter;
	}

	/**
	 * ロールバック時に依存しているリソースの名前を設定
	 *
	 * @param string[]|null $rollbackAfter ロールバック時に依存しているリソースの名前
	 * @return WorkingResource $this
	 */
	public function withRollbackAfter(?array $rollbackAfter): WorkingResource {
		$this->rollbackAfter = $rollbackAfter;
		return $this;
	}
	/**
     * @var OutputField[] リソースを作成したときに Output に記録するフィールド
	 */
	protected $outputFields;

	/**
	 * リソースを作成したときに Output に記録するフィールドを取得
	 *
	 * @return OutputField[]|null リソースを作成したときに Output に記録するフィールド
	 */
	public function getOutputFields(): ?array {
		return $this->outputFields;
	}

	/**
	 * リソースを作成したときに Output に記録するフィールドを設定
	 *
	 * @param OutputField[]|null $outputFields リソースを作成したときに Output に記録するフィールド
	 */
	public function setOutputFields(?array $outputFields) {
		$this->outputFields = $outputFields;
	}

	/**
	 * リソースを作成したときに Output に記録するフィールドを設定
	 *
	 * @param OutputField[]|null $outputFields リソースを作成したときに Output に記録するフィールド
	 * @return WorkingResource $this
	 */
	public function withOutputFields(?array $outputFields): WorkingResource {
		$this->outputFields = $outputFields;
		return $this;
	}
	/**
     * @var string 実行に対して割り振られる一意な ID
	 */
	protected $workId;

	/**
	 * 実行に対して割り振られる一意な IDを取得
	 *
	 * @return string|null 実行に対して割り振られる一意な ID
	 */
	public function getWorkId(): ?string {
		return $this->workId;
	}

	/**
	 * 実行に対して割り振られる一意な IDを設定
	 *
	 * @param string|null $workId 実行に対して割り振られる一意な ID
	 */
	public function setWorkId(?string $workId) {
		$this->workId = $workId;
	}

	/**
	 * 実行に対して割り振られる一意な IDを設定
	 *
	 * @param string|null $workId 実行に対して割り振られる一意な ID
	 * @return WorkingResource $this
	 */
	public function withWorkId(?string $workId): WorkingResource {
		$this->workId = $workId;
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
	 * @return WorkingResource $this
	 */
	public function withCreatedAt(?int $createdAt): WorkingResource {
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
	 * @return WorkingResource $this
	 */
	public function withUpdatedAt(?int $updatedAt): WorkingResource {
		$this->updatedAt = $updatedAt;
		return $this;
	}

    public function toJson(): array {
        return array(
            "resourceId" => $this->resourceId,
            "context" => $this->context,
            "type" => $this->type,
            "name" => $this->name,
            "request" => $this->request,
            "after" => $this->after,
            "rollbackContext" => $this->rollbackContext,
            "rollbackRequest" => $this->rollbackRequest,
            "rollbackAfter" => $this->rollbackAfter,
            "outputFields" => array_map(
                function (OutputField $v) {
                    return $v->toJson();
                },
                $this->outputFields == null ? [] : $this->outputFields
            ),
            "workId" => $this->workId,
            "createdAt" => $this->createdAt,
            "updatedAt" => $this->updatedAt,
        );
    }

    public static function fromJson(array $data): WorkingResource {
        $model = new WorkingResource();
        $model->setResourceId(isset($data["resourceId"]) ? $data["resourceId"] : null);
        $model->setContext(isset($data["context"]) ? $data["context"] : null);
        $model->setType(isset($data["type"]) ? $data["type"] : null);
        $model->setName(isset($data["name"]) ? $data["name"] : null);
        $model->setRequest(isset($data["request"]) ? $data["request"] : null);
        $model->setAfter(isset($data["after"]) ? $data["after"] : null);
        $model->setRollbackContext(isset($data["rollbackContext"]) ? $data["rollbackContext"] : null);
        $model->setRollbackRequest(isset($data["rollbackRequest"]) ? $data["rollbackRequest"] : null);
        $model->setRollbackAfter(isset($data["rollbackAfter"]) ? $data["rollbackAfter"] : null);
        $model->setOutputFields(array_map(
                function ($v) {
                    return OutputField::fromJson($v);
                },
                isset($data["outputFields"]) ? $data["outputFields"] : []
            )
        );
        $model->setWorkId(isset($data["workId"]) ? $data["workId"] : null);
        $model->setCreatedAt(isset($data["createdAt"]) ? $data["createdAt"] : null);
        $model->setUpdatedAt(isset($data["updatedAt"]) ? $data["updatedAt"] : null);
        return $model;
    }
}