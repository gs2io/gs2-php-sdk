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

namespace Gs2\Log\Request;

use Gs2\Core\Control\Gs2BasicRequest;

/**
 * ネームスペースを新規作成 のリクエストモデル
 *
 * @author Game Server Services, Inc.
 */
class CreateNamespaceRequest extends Gs2BasicRequest {

    /** @var string カテゴリー名 */
    private $name;

    /**
     * カテゴリー名を取得
     *
     * @return string|null ネームスペースを新規作成
     */
    public function getName(): ?string {
        return $this->name;
    }

    /**
     * カテゴリー名を設定
     *
     * @param string $name ネームスペースを新規作成
     */
    public function setName(string $name) {
        $this->name = $name;
    }

    /**
     * カテゴリー名を設定
     *
     * @param string $name ネームスペースを新規作成
     * @return CreateNamespaceRequest $this
     */
    public function withName(string $name): CreateNamespaceRequest {
        $this->setName($name);
        return $this;
    }

    /** @var string ネームスペースの説明 */
    private $description;

    /**
     * ネームスペースの説明を取得
     *
     * @return string|null ネームスペースを新規作成
     */
    public function getDescription(): ?string {
        return $this->description;
    }

    /**
     * ネームスペースの説明を設定
     *
     * @param string $description ネームスペースを新規作成
     */
    public function setDescription(string $description) {
        $this->description = $description;
    }

    /**
     * ネームスペースの説明を設定
     *
     * @param string $description ネームスペースを新規作成
     * @return CreateNamespaceRequest $this
     */
    public function withDescription(string $description): CreateNamespaceRequest {
        $this->setDescription($description);
        return $this;
    }

    /** @var string ログの書き出し方法 */
    private $type;

    /**
     * ログの書き出し方法を取得
     *
     * @return string|null ネームスペースを新規作成
     */
    public function getType(): ?string {
        return $this->type;
    }

    /**
     * ログの書き出し方法を設定
     *
     * @param string $type ネームスペースを新規作成
     */
    public function setType(string $type) {
        $this->type = $type;
    }

    /**
     * ログの書き出し方法を設定
     *
     * @param string $type ネームスペースを新規作成
     * @return CreateNamespaceRequest $this
     */
    public function withType(string $type): CreateNamespaceRequest {
        $this->setType($type);
        return $this;
    }

    /** @var string GCPのクレデンシャル */
    private $gcpCredentialJson;

    /**
     * GCPのクレデンシャルを取得
     *
     * @return string|null ネームスペースを新規作成
     */
    public function getGcpCredentialJson(): ?string {
        return $this->gcpCredentialJson;
    }

    /**
     * GCPのクレデンシャルを設定
     *
     * @param string $gcpCredentialJson ネームスペースを新規作成
     */
    public function setGcpCredentialJson(string $gcpCredentialJson) {
        $this->gcpCredentialJson = $gcpCredentialJson;
    }

    /**
     * GCPのクレデンシャルを設定
     *
     * @param string $gcpCredentialJson ネームスペースを新規作成
     * @return CreateNamespaceRequest $this
     */
    public function withGcpCredentialJson(string $gcpCredentialJson): CreateNamespaceRequest {
        $this->setGcpCredentialJson($gcpCredentialJson);
        return $this;
    }

    /** @var string BigQueryのデータセット名 */
    private $bigQueryDatasetName;

    /**
     * BigQueryのデータセット名を取得
     *
     * @return string|null ネームスペースを新規作成
     */
    public function getBigQueryDatasetName(): ?string {
        return $this->bigQueryDatasetName;
    }

    /**
     * BigQueryのデータセット名を設定
     *
     * @param string $bigQueryDatasetName ネームスペースを新規作成
     */
    public function setBigQueryDatasetName(string $bigQueryDatasetName) {
        $this->bigQueryDatasetName = $bigQueryDatasetName;
    }

    /**
     * BigQueryのデータセット名を設定
     *
     * @param string $bigQueryDatasetName ネームスペースを新規作成
     * @return CreateNamespaceRequest $this
     */
    public function withBigQueryDatasetName(string $bigQueryDatasetName): CreateNamespaceRequest {
        $this->setBigQueryDatasetName($bigQueryDatasetName);
        return $this;
    }

    /** @var int ログの保存期間(日) */
    private $logExpireDays;

    /**
     * ログの保存期間(日)を取得
     *
     * @return int|null ネームスペースを新規作成
     */
    public function getLogExpireDays(): ?int {
        return $this->logExpireDays;
    }

    /**
     * ログの保存期間(日)を設定
     *
     * @param int $logExpireDays ネームスペースを新規作成
     */
    public function setLogExpireDays(int $logExpireDays) {
        $this->logExpireDays = $logExpireDays;
    }

    /**
     * ログの保存期間(日)を設定
     *
     * @param int $logExpireDays ネームスペースを新規作成
     * @return CreateNamespaceRequest $this
     */
    public function withLogExpireDays(int $logExpireDays): CreateNamespaceRequest {
        $this->setLogExpireDays($logExpireDays);
        return $this;
    }

    /** @var string AWSのリージョン */
    private $awsRegion;

    /**
     * AWSのリージョンを取得
     *
     * @return string|null ネームスペースを新規作成
     */
    public function getAwsRegion(): ?string {
        return $this->awsRegion;
    }

    /**
     * AWSのリージョンを設定
     *
     * @param string $awsRegion ネームスペースを新規作成
     */
    public function setAwsRegion(string $awsRegion) {
        $this->awsRegion = $awsRegion;
    }

    /**
     * AWSのリージョンを設定
     *
     * @param string $awsRegion ネームスペースを新規作成
     * @return CreateNamespaceRequest $this
     */
    public function withAwsRegion(string $awsRegion): CreateNamespaceRequest {
        $this->setAwsRegion($awsRegion);
        return $this;
    }

    /** @var string AWSのアクセスキーID */
    private $awsAccessKeyId;

    /**
     * AWSのアクセスキーIDを取得
     *
     * @return string|null ネームスペースを新規作成
     */
    public function getAwsAccessKeyId(): ?string {
        return $this->awsAccessKeyId;
    }

    /**
     * AWSのアクセスキーIDを設定
     *
     * @param string $awsAccessKeyId ネームスペースを新規作成
     */
    public function setAwsAccessKeyId(string $awsAccessKeyId) {
        $this->awsAccessKeyId = $awsAccessKeyId;
    }

    /**
     * AWSのアクセスキーIDを設定
     *
     * @param string $awsAccessKeyId ネームスペースを新規作成
     * @return CreateNamespaceRequest $this
     */
    public function withAwsAccessKeyId(string $awsAccessKeyId): CreateNamespaceRequest {
        $this->setAwsAccessKeyId($awsAccessKeyId);
        return $this;
    }

    /** @var string AWSのシークレットアクセスキー */
    private $awsSecretAccessKey;

    /**
     * AWSのシークレットアクセスキーを取得
     *
     * @return string|null ネームスペースを新規作成
     */
    public function getAwsSecretAccessKey(): ?string {
        return $this->awsSecretAccessKey;
    }

    /**
     * AWSのシークレットアクセスキーを設定
     *
     * @param string $awsSecretAccessKey ネームスペースを新規作成
     */
    public function setAwsSecretAccessKey(string $awsSecretAccessKey) {
        $this->awsSecretAccessKey = $awsSecretAccessKey;
    }

    /**
     * AWSのシークレットアクセスキーを設定
     *
     * @param string $awsSecretAccessKey ネームスペースを新規作成
     * @return CreateNamespaceRequest $this
     */
    public function withAwsSecretAccessKey(string $awsSecretAccessKey): CreateNamespaceRequest {
        $this->setAwsSecretAccessKey($awsSecretAccessKey);
        return $this;
    }

    /** @var string Kinesis Firehose のストリーム名 */
    private $firehoseStreamName;

    /**
     * Kinesis Firehose のストリーム名を取得
     *
     * @return string|null ネームスペースを新規作成
     */
    public function getFirehoseStreamName(): ?string {
        return $this->firehoseStreamName;
    }

    /**
     * Kinesis Firehose のストリーム名を設定
     *
     * @param string $firehoseStreamName ネームスペースを新規作成
     */
    public function setFirehoseStreamName(string $firehoseStreamName) {
        $this->firehoseStreamName = $firehoseStreamName;
    }

    /**
     * Kinesis Firehose のストリーム名を設定
     *
     * @param string $firehoseStreamName ネームスペースを新規作成
     * @return CreateNamespaceRequest $this
     */
    public function withFirehoseStreamName(string $firehoseStreamName): CreateNamespaceRequest {
        $this->setFirehoseStreamName($firehoseStreamName);
        return $this;
    }

}