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
 * 作成されたのリソース
 *
 * @author Game Server Services, Inc.
 *
 */
class Resource_ implements IModel {
	/**
     * @var string 作成されたのリソース
	 */
	protected $resourceId;

	/**
	 * 作成されたのリソースを取得
	 *
	 * @return string|null 作成されたのリソース
	 */
	public function getResourceId(): ?string {
		return $this->resourceId;
	}

	/**
	 * 作成されたのリソースを設定
	 *
	 * @param string|null $resourceId 作成されたのリソース
	 */
	public function setResourceId(?string $resourceId) {
		$this->resourceId = $resourceId;
	}

	/**
	 * 作成されたのリソースを設定
	 *
	 * @param string|null $resourceId 作成されたのリソース
	 * @return Resource_ $this
	 */
	public function withResourceId(?string $resourceId): Resource_ {
		$this->resourceId = $resourceId;
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
	 * @return Resource_ $this
	 */
	public function withType(?string $type): Resource_ {
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
	 * @return Resource_ $this
	 */
	public function withName(?string $name): Resource_ {
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
	 * @return Resource_ $this
	 */
	public function withRequest(?string $request): Resource_ {
		$this->request = $request;
		return $this;
	}
	/**
     * @var string リソースの作成・更新のレスポンス
	 */
	protected $response;

	/**
	 * リソースの作成・更新のレスポンスを取得
	 *
	 * @return string|null リソースの作成・更新のレスポンス
	 */
	public function getResponse(): ?string {
		return $this->response;
	}

	/**
	 * リソースの作成・更新のレスポンスを設定
	 *
	 * @param string|null $response リソースの作成・更新のレスポンス
	 */
	public function setResponse(?string $response) {
		$this->response = $response;
	}

	/**
	 * リソースの作成・更新のレスポンスを設定
	 *
	 * @param string|null $response リソースの作成・更新のレスポンス
	 * @return Resource_ $this
	 */
	public function withResponse(?string $response): Resource_ {
		$this->response = $response;
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
	 * @return Resource_ $this
	 */
	public function withRollbackContext(?string $rollbackContext): Resource_ {
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
	 * @return Resource_ $this
	 */
	public function withRollbackRequest(?string $rollbackRequest): Resource_ {
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
	 * @return Resource_ $this
	 */
	public function withRollbackAfter(?array $rollbackAfter): Resource_ {
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
	 * @return Resource_ $this
	 */
	public function withOutputFields(?array $outputFields): Resource_ {
		$this->outputFields = $outputFields;
		return $this;
	}
	/**
     * @var string このリソースが作成された時の実行 ID
	 */
	protected $workId;

	/**
	 * このリソースが作成された時の実行 IDを取得
	 *
	 * @return string|null このリソースが作成された時の実行 ID
	 */
	public function getWorkId(): ?string {
		return $this->workId;
	}

	/**
	 * このリソースが作成された時の実行 IDを設定
	 *
	 * @param string|null $workId このリソースが作成された時の実行 ID
	 */
	public function setWorkId(?string $workId) {
		$this->workId = $workId;
	}

	/**
	 * このリソースが作成された時の実行 IDを設定
	 *
	 * @param string|null $workId このリソースが作成された時の実行 ID
	 * @return Resource_ $this
	 */
	public function withWorkId(?string $workId): Resource_ {
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
	 * @return Resource_ $this
	 */
	public function withCreatedAt(?int $createdAt): Resource_ {
		$this->createdAt = $createdAt;
		return $this;
	}

    public function toJson(): array {
        return array(
            "resourceId" => $this->resourceId,
            "type" => $this->type,
            "name" => $this->name,
            "request" => $this->request,
            "response" => $this->response,
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
        );
    }

    public static function fromJson(array $data): Resource_ {
        $model = new Resource_();
        $model->setResourceId(isset($data["resourceId"]) ? $data["resourceId"] : null);
        $model->setType(isset($data["type"]) ? $data["type"] : null);
        $model->setName(isset($data["name"]) ? $data["name"] : null);
        $model->setRequest(isset($data["request"]) ? $data["request"] : null);
        $model->setResponse(isset($data["response"]) ? $data["response"] : null);
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
        return $model;
    }
}