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
 * ネームスペースを更新 のリクエストモデル
 *
 * @author Game Server Services, Inc.
 */
class UpdateNamespaceRequest extends Gs2BasicRequest {

    /** @var string ネームスペース名 */
    private $namespaceName;

    /**
     * ネームスペース名を取得
     *
     * @return string|null ネームスペースを更新
     */
    public function getNamespaceName(): ?string {
        return $this->namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName ネームスペースを更新
     */
    public function setNamespaceName(string $namespaceName = null) {
        $this->namespaceName = $namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName ネームスペースを更新
     * @return UpdateNamespaceRequest $this
     */
    public function withNamespaceName(string $namespaceName = null): UpdateNamespaceRequest {
        $this->setNamespaceName($namespaceName);
        return $this;
    }

    /** @var string ネームスペースの説明 */
    private $description;

    /**
     * ネームスペースの説明を取得
     *
     * @return string|null ネームスペースを更新
     */
    public function getDescription(): ?string {
        return $this->description;
    }

    /**
     * ネームスペースの説明を設定
     *
     * @param string $description ネームスペースを更新
     */
    public function setDescription(string $description = null) {
        $this->description = $description;
    }

    /**
     * ネームスペースの説明を設定
     *
     * @param string $description ネームスペースを更新
     * @return UpdateNamespaceRequest $this
     */
    public function withDescription(string $description = null): UpdateNamespaceRequest {
        $this->setDescription($description);
        return $this;
    }

    /** @var string ログの書き出し方法 */
    private $type;

    /**
     * ログの書き出し方法を取得
     *
     * @return string|null ネームスペースを更新
     */
    public function getType(): ?string {
        return $this->type;
    }

    /**
     * ログの書き出し方法を設定
     *
     * @param string $type ネームスペースを更新
     */
    public function setType(string $type = null) {
        $this->type = $type;
    }

    /**
     * ログの書き出し方法を設定
     *
     * @param string $type ネームスペースを更新
     * @return UpdateNamespaceRequest $this
     */
    public function withType(string $type = null): UpdateNamespaceRequest {
        $this->setType($type);
        return $this;
    }

    /** @var string GCPのクレデンシャル */
    private $gcpCredentialJson;

    /**
     * GCPのクレデンシャルを取得
     *
     * @return string|null ネームスペースを更新
     */
    public function getGcpCredentialJson(): ?string {
        return $this->gcpCredentialJson;
    }

    /**
     * GCPのクレデンシャルを設定
     *
     * @param string $gcpCredentialJson ネームスペースを更新
     */
    public function setGcpCredentialJson(string $gcpCredentialJson = null) {
        $this->gcpCredentialJson = $gcpCredentialJson;
    }

    /**
     * GCPのクレデンシャルを設定
     *
     * @param string $gcpCredentialJson ネームスペースを更新
     * @return UpdateNamespaceRequest $this
     */
    public function withGcpCredentialJson(string $gcpCredentialJson = null): UpdateNamespaceRequest {
        $this->setGcpCredentialJson($gcpCredentialJson);
        return $this;
    }

    /** @var string BigQueryのデータセット名 */
    private $bigQueryDatasetName;

    /**
     * BigQueryのデータセット名を取得
     *
     * @return string|null ネームスペースを更新
     */
    public function getBigQueryDatasetName(): ?string {
        return $this->bigQueryDatasetName;
    }

    /**
     * BigQueryのデータセット名を設定
     *
     * @param string $bigQueryDatasetName ネームスペースを更新
     */
    public function setBigQueryDatasetName(string $bigQueryDatasetName = null) {
        $this->bigQueryDatasetName = $bigQueryDatasetName;
    }

    /**
     * BigQueryのデータセット名を設定
     *
     * @param string $bigQueryDatasetName ネームスペースを更新
     * @return UpdateNamespaceRequest $this
     */
    public function withBigQueryDatasetName(string $bigQueryDatasetName = null): UpdateNamespaceRequest {
        $this->setBigQueryDatasetName($bigQueryDatasetName);
        return $this;
    }

    /** @var int ログの保存期間(日) */
    private $logExpireDays;

    /**
     * ログの保存期間(日)を取得
     *
     * @return int|null ネームスペースを更新
     */
    public function getLogExpireDays(): ?int {
        return $this->logExpireDays;
    }

    /**
     * ログの保存期間(日)を設定
     *
     * @param int $logExpireDays ネームスペースを更新
     */
    public function setLogExpireDays(int $logExpireDays = null) {
        $this->logExpireDays = $logExpireDays;
    }

    /**
     * ログの保存期間(日)を設定
     *
     * @param int $logExpireDays ネームスペースを更新
     * @return UpdateNamespaceRequest $this
     */
    public function withLogExpireDays(int $logExpireDays = null): UpdateNamespaceRequest {
        $this->setLogExpireDays($logExpireDays);
        return $this;
    }

    /** @var string AWSのリージョン */
    private $awsRegion;

    /**
     * AWSのリージョンを取得
     *
     * @return string|null ネームスペースを更新
     */
    public function getAwsRegion(): ?string {
        return $this->awsRegion;
    }

    /**
     * AWSのリージョンを設定
     *
     * @param string $awsRegion ネームスペースを更新
     */
    public function setAwsRegion(string $awsRegion = null) {
        $this->awsRegion = $awsRegion;
    }

    /**
     * AWSのリージョンを設定
     *
     * @param string $awsRegion ネームスペースを更新
     * @return UpdateNamespaceRequest $this
     */
    public function withAwsRegion(string $awsRegion = null): UpdateNamespaceRequest {
        $this->setAwsRegion($awsRegion);
        return $this;
    }

    /** @var string AWSのアクセスキーID */
    private $awsAccessKeyId;

    /**
     * AWSのアクセスキーIDを取得
     *
     * @return string|null ネームスペースを更新
     */
    public function getAwsAccessKeyId(): ?string {
        return $this->awsAccessKeyId;
    }

    /**
     * AWSのアクセスキーIDを設定
     *
     * @param string $awsAccessKeyId ネームスペースを更新
     */
    public function setAwsAccessKeyId(string $awsAccessKeyId = null) {
        $this->awsAccessKeyId = $awsAccessKeyId;
    }

    /**
     * AWSのアクセスキーIDを設定
     *
     * @param string $awsAccessKeyId ネームスペースを更新
     * @return UpdateNamespaceRequest $this
     */
    public function withAwsAccessKeyId(string $awsAccessKeyId = null): UpdateNamespaceRequest {
        $this->setAwsAccessKeyId($awsAccessKeyId);
        return $this;
    }

    /** @var string AWSのシークレットアクセスキー */
    private $awsSecretAccessKey;

    /**
     * AWSのシークレットアクセスキーを取得
     *
     * @return string|null ネームスペースを更新
     */
    public function getAwsSecretAccessKey(): ?string {
        return $this->awsSecretAccessKey;
    }

    /**
     * AWSのシークレットアクセスキーを設定
     *
     * @param string $awsSecretAccessKey ネームスペースを更新
     */
    public function setAwsSecretAccessKey(string $awsSecretAccessKey = null) {
        $this->awsSecretAccessKey = $awsSecretAccessKey;
    }

    /**
     * AWSのシークレットアクセスキーを設定
     *
     * @param string $awsSecretAccessKey ネームスペースを更新
     * @return UpdateNamespaceRequest $this
     */
    public function withAwsSecretAccessKey(string $awsSecretAccessKey = null): UpdateNamespaceRequest {
        $this->setAwsSecretAccessKey($awsSecretAccessKey);
        return $this;
    }

    /** @var string Kinesis Firehose のストリーム名 */
    private $firehoseStreamName;

    /**
     * Kinesis Firehose のストリーム名を取得
     *
     * @return string|null ネームスペースを更新
     */
    public function getFirehoseStreamName(): ?string {
        return $this->firehoseStreamName;
    }

    /**
     * Kinesis Firehose のストリーム名を設定
     *
     * @param string $firehoseStreamName ネームスペースを更新
     */
    public function setFirehoseStreamName(string $firehoseStreamName = null) {
        $this->firehoseStreamName = $firehoseStreamName;
    }

    /**
     * Kinesis Firehose のストリーム名を設定
     *
     * @param string $firehoseStreamName ネームスペースを更新
     * @return UpdateNamespaceRequest $this
     */
    public function withFirehoseStreamName(string $firehoseStreamName = null): UpdateNamespaceRequest {
        $this->setFirehoseStreamName($firehoseStreamName);
        return $this;
    }

}