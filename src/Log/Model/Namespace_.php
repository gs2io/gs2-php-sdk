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

namespace Gs2\Log\Model;

use Gs2\Core\Model\IModel;

/**
 * ネームスペース
 *
 * @author Game Server Services, Inc.
 *
 */
class Namespace_ implements IModel {
	/**
     * @var string ネームスペース
	 */
	protected $namespaceId;

	/**
	 * ネームスペースを取得
	 *
	 * @return string|null ネームスペース
	 */
	public function getNamespaceId(): ?string {
		return $this->namespaceId;
	}

	/**
	 * ネームスペースを設定
	 *
	 * @param string|null $namespaceId ネームスペース
	 */
	public function setNamespaceId(?string $namespaceId) {
		$this->namespaceId = $namespaceId;
	}

	/**
	 * ネームスペースを設定
	 *
	 * @param string|null $namespaceId ネームスペース
	 * @return Namespace_ $this
	 */
	public function withNamespaceId(?string $namespaceId): Namespace_ {
		$this->namespaceId = $namespaceId;
		return $this;
	}
	/**
     * @var string オーナーID
	 */
	protected $ownerId;

	/**
	 * オーナーIDを取得
	 *
	 * @return string|null オーナーID
	 */
	public function getOwnerId(): ?string {
		return $this->ownerId;
	}

	/**
	 * オーナーIDを設定
	 *
	 * @param string|null $ownerId オーナーID
	 */
	public function setOwnerId(?string $ownerId) {
		$this->ownerId = $ownerId;
	}

	/**
	 * オーナーIDを設定
	 *
	 * @param string|null $ownerId オーナーID
	 * @return Namespace_ $this
	 */
	public function withOwnerId(?string $ownerId): Namespace_ {
		$this->ownerId = $ownerId;
		return $this;
	}
	/**
     * @var string カテゴリー名
	 */
	protected $name;

	/**
	 * カテゴリー名を取得
	 *
	 * @return string|null カテゴリー名
	 */
	public function getName(): ?string {
		return $this->name;
	}

	/**
	 * カテゴリー名を設定
	 *
	 * @param string|null $name カテゴリー名
	 */
	public function setName(?string $name) {
		$this->name = $name;
	}

	/**
	 * カテゴリー名を設定
	 *
	 * @param string|null $name カテゴリー名
	 * @return Namespace_ $this
	 */
	public function withName(?string $name): Namespace_ {
		$this->name = $name;
		return $this;
	}
	/**
     * @var string ネームスペースの説明
	 */
	protected $description;

	/**
	 * ネームスペースの説明を取得
	 *
	 * @return string|null ネームスペースの説明
	 */
	public function getDescription(): ?string {
		return $this->description;
	}

	/**
	 * ネームスペースの説明を設定
	 *
	 * @param string|null $description ネームスペースの説明
	 */
	public function setDescription(?string $description) {
		$this->description = $description;
	}

	/**
	 * ネームスペースの説明を設定
	 *
	 * @param string|null $description ネームスペースの説明
	 * @return Namespace_ $this
	 */
	public function withDescription(?string $description): Namespace_ {
		$this->description = $description;
		return $this;
	}
	/**
     * @var string ログの書き出し方法
	 */
	protected $type;

	/**
	 * ログの書き出し方法を取得
	 *
	 * @return string|null ログの書き出し方法
	 */
	public function getType(): ?string {
		return $this->type;
	}

	/**
	 * ログの書き出し方法を設定
	 *
	 * @param string|null $type ログの書き出し方法
	 */
	public function setType(?string $type) {
		$this->type = $type;
	}

	/**
	 * ログの書き出し方法を設定
	 *
	 * @param string|null $type ログの書き出し方法
	 * @return Namespace_ $this
	 */
	public function withType(?string $type): Namespace_ {
		$this->type = $type;
		return $this;
	}
	/**
     * @var string GCPのクレデンシャル
	 */
	protected $gcpCredentialJson;

	/**
	 * GCPのクレデンシャルを取得
	 *
	 * @return string|null GCPのクレデンシャル
	 */
	public function getGcpCredentialJson(): ?string {
		return $this->gcpCredentialJson;
	}

	/**
	 * GCPのクレデンシャルを設定
	 *
	 * @param string|null $gcpCredentialJson GCPのクレデンシャル
	 */
	public function setGcpCredentialJson(?string $gcpCredentialJson) {
		$this->gcpCredentialJson = $gcpCredentialJson;
	}

	/**
	 * GCPのクレデンシャルを設定
	 *
	 * @param string|null $gcpCredentialJson GCPのクレデンシャル
	 * @return Namespace_ $this
	 */
	public function withGcpCredentialJson(?string $gcpCredentialJson): Namespace_ {
		$this->gcpCredentialJson = $gcpCredentialJson;
		return $this;
	}
	/**
     * @var string BigQueryのデータセット名
	 */
	protected $bigQueryDatasetName;

	/**
	 * BigQueryのデータセット名を取得
	 *
	 * @return string|null BigQueryのデータセット名
	 */
	public function getBigQueryDatasetName(): ?string {
		return $this->bigQueryDatasetName;
	}

	/**
	 * BigQueryのデータセット名を設定
	 *
	 * @param string|null $bigQueryDatasetName BigQueryのデータセット名
	 */
	public function setBigQueryDatasetName(?string $bigQueryDatasetName) {
		$this->bigQueryDatasetName = $bigQueryDatasetName;
	}

	/**
	 * BigQueryのデータセット名を設定
	 *
	 * @param string|null $bigQueryDatasetName BigQueryのデータセット名
	 * @return Namespace_ $this
	 */
	public function withBigQueryDatasetName(?string $bigQueryDatasetName): Namespace_ {
		$this->bigQueryDatasetName = $bigQueryDatasetName;
		return $this;
	}
	/**
     * @var int ログの保存期間(日)
	 */
	protected $logExpireDays;

	/**
	 * ログの保存期間(日)を取得
	 *
	 * @return int|null ログの保存期間(日)
	 */
	public function getLogExpireDays(): ?int {
		return $this->logExpireDays;
	}

	/**
	 * ログの保存期間(日)を設定
	 *
	 * @param int|null $logExpireDays ログの保存期間(日)
	 */
	public function setLogExpireDays(?int $logExpireDays) {
		$this->logExpireDays = $logExpireDays;
	}

	/**
	 * ログの保存期間(日)を設定
	 *
	 * @param int|null $logExpireDays ログの保存期間(日)
	 * @return Namespace_ $this
	 */
	public function withLogExpireDays(?int $logExpireDays): Namespace_ {
		$this->logExpireDays = $logExpireDays;
		return $this;
	}
	/**
     * @var string AWSのリージョン
	 */
	protected $awsRegion;

	/**
	 * AWSのリージョンを取得
	 *
	 * @return string|null AWSのリージョン
	 */
	public function getAwsRegion(): ?string {
		return $this->awsRegion;
	}

	/**
	 * AWSのリージョンを設定
	 *
	 * @param string|null $awsRegion AWSのリージョン
	 */
	public function setAwsRegion(?string $awsRegion) {
		$this->awsRegion = $awsRegion;
	}

	/**
	 * AWSのリージョンを設定
	 *
	 * @param string|null $awsRegion AWSのリージョン
	 * @return Namespace_ $this
	 */
	public function withAwsRegion(?string $awsRegion): Namespace_ {
		$this->awsRegion = $awsRegion;
		return $this;
	}
	/**
     * @var string AWSのアクセスキーID
	 */
	protected $awsAccessKeyId;

	/**
	 * AWSのアクセスキーIDを取得
	 *
	 * @return string|null AWSのアクセスキーID
	 */
	public function getAwsAccessKeyId(): ?string {
		return $this->awsAccessKeyId;
	}

	/**
	 * AWSのアクセスキーIDを設定
	 *
	 * @param string|null $awsAccessKeyId AWSのアクセスキーID
	 */
	public function setAwsAccessKeyId(?string $awsAccessKeyId) {
		$this->awsAccessKeyId = $awsAccessKeyId;
	}

	/**
	 * AWSのアクセスキーIDを設定
	 *
	 * @param string|null $awsAccessKeyId AWSのアクセスキーID
	 * @return Namespace_ $this
	 */
	public function withAwsAccessKeyId(?string $awsAccessKeyId): Namespace_ {
		$this->awsAccessKeyId = $awsAccessKeyId;
		return $this;
	}
	/**
     * @var string AWSのシークレットアクセスキー
	 */
	protected $awsSecretAccessKey;

	/**
	 * AWSのシークレットアクセスキーを取得
	 *
	 * @return string|null AWSのシークレットアクセスキー
	 */
	public function getAwsSecretAccessKey(): ?string {
		return $this->awsSecretAccessKey;
	}

	/**
	 * AWSのシークレットアクセスキーを設定
	 *
	 * @param string|null $awsSecretAccessKey AWSのシークレットアクセスキー
	 */
	public function setAwsSecretAccessKey(?string $awsSecretAccessKey) {
		$this->awsSecretAccessKey = $awsSecretAccessKey;
	}

	/**
	 * AWSのシークレットアクセスキーを設定
	 *
	 * @param string|null $awsSecretAccessKey AWSのシークレットアクセスキー
	 * @return Namespace_ $this
	 */
	public function withAwsSecretAccessKey(?string $awsSecretAccessKey): Namespace_ {
		$this->awsSecretAccessKey = $awsSecretAccessKey;
		return $this;
	}
	/**
     * @var string Kinesis Firehose のストリーム名
	 */
	protected $firehoseStreamName;

	/**
	 * Kinesis Firehose のストリーム名を取得
	 *
	 * @return string|null Kinesis Firehose のストリーム名
	 */
	public function getFirehoseStreamName(): ?string {
		return $this->firehoseStreamName;
	}

	/**
	 * Kinesis Firehose のストリーム名を設定
	 *
	 * @param string|null $firehoseStreamName Kinesis Firehose のストリーム名
	 */
	public function setFirehoseStreamName(?string $firehoseStreamName) {
		$this->firehoseStreamName = $firehoseStreamName;
	}

	/**
	 * Kinesis Firehose のストリーム名を設定
	 *
	 * @param string|null $firehoseStreamName Kinesis Firehose のストリーム名
	 * @return Namespace_ $this
	 */
	public function withFirehoseStreamName(?string $firehoseStreamName): Namespace_ {
		$this->firehoseStreamName = $firehoseStreamName;
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
	 * @return Namespace_ $this
	 */
	public function withCreatedAt(?int $createdAt): Namespace_ {
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
	 * @return Namespace_ $this
	 */
	public function withUpdatedAt(?int $updatedAt): Namespace_ {
		$this->updatedAt = $updatedAt;
		return $this;
	}

    public function toJson(): array {
        return array(
            "namespaceId" => $this->namespaceId,
            "ownerId" => $this->ownerId,
            "name" => $this->name,
            "description" => $this->description,
            "type" => $this->type,
            "gcpCredentialJson" => $this->gcpCredentialJson,
            "bigQueryDatasetName" => $this->bigQueryDatasetName,
            "logExpireDays" => $this->logExpireDays,
            "awsRegion" => $this->awsRegion,
            "awsAccessKeyId" => $this->awsAccessKeyId,
            "awsSecretAccessKey" => $this->awsSecretAccessKey,
            "firehoseStreamName" => $this->firehoseStreamName,
            "createdAt" => $this->createdAt,
            "updatedAt" => $this->updatedAt,
        );
    }

    public static function fromJson(array $data): Namespace_ {
        $model = new Namespace_();
        $model->setNamespaceId(isset($data["namespaceId"]) ? $data["namespaceId"] : null);
        $model->setOwnerId(isset($data["ownerId"]) ? $data["ownerId"] : null);
        $model->setName(isset($data["name"]) ? $data["name"] : null);
        $model->setDescription(isset($data["description"]) ? $data["description"] : null);
        $model->setType(isset($data["type"]) ? $data["type"] : null);
        $model->setGcpCredentialJson(isset($data["gcpCredentialJson"]) ? $data["gcpCredentialJson"] : null);
        $model->setBigQueryDatasetName(isset($data["bigQueryDatasetName"]) ? $data["bigQueryDatasetName"] : null);
        $model->setLogExpireDays(isset($data["logExpireDays"]) ? $data["logExpireDays"] : null);
        $model->setAwsRegion(isset($data["awsRegion"]) ? $data["awsRegion"] : null);
        $model->setAwsAccessKeyId(isset($data["awsAccessKeyId"]) ? $data["awsAccessKeyId"] : null);
        $model->setAwsSecretAccessKey(isset($data["awsSecretAccessKey"]) ? $data["awsSecretAccessKey"] : null);
        $model->setFirehoseStreamName(isset($data["firehoseStreamName"]) ? $data["firehoseStreamName"] : null);
        $model->setCreatedAt(isset($data["createdAt"]) ? $data["createdAt"] : null);
        $model->setUpdatedAt(isset($data["updatedAt"]) ? $data["updatedAt"] : null);
        return $model;
    }
}