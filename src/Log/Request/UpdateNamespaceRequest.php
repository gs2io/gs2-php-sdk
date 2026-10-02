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
 * Request for updateNamespace: Update Namespace
 *
 * @see https://docs.gs2.io/api_reference/log/sdk/#updatenamespace
 */
class UpdateNamespaceRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string Description */
    private $description;
    /** @var string Log Export Method */
    private $type;
    /** @var string GCP Credentials */
    private $gcpCredentialJson;
    /** @var string BigQuery Dataset Name */
    private $bigQueryDatasetName;
    /** @var int Log Retention Period (days) */
    private $logExpireDays;
    /** @var string AWS Region */
    private $awsRegion;
    /** @var string AWS Access Key ID */
    private $awsAccessKeyId;
    /** @var string AWS Secret Access Key */
    private $awsSecretAccessKey;
    /** @var string Kinesis Firehose Stream Name */
    private $firehoseStreamName;
    /** @var string Compress Data for Kinesis Firehose */
    private $firehoseCompressData;
    /** @return string|null Namespace name */
	public function getNamespaceName(): ?string {
		return $this->namespaceName;
	}
    /** @param string|null $namespaceName Namespace name */
	public function setNamespaceName(?string $namespaceName) {
		$this->namespaceName = $namespaceName;
	}
    /**
     * @param string|null $namespaceName Namespace name
     * @return UpdateNamespaceRequest
     */
	public function withNamespaceName(?string $namespaceName): UpdateNamespaceRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
    /** @return string|null Description */
	public function getDescription(): ?string {
		return $this->description;
	}
    /** @param string|null $description Description */
	public function setDescription(?string $description) {
		$this->description = $description;
	}
    /**
     * @param string|null $description Description
     * @return UpdateNamespaceRequest
     */
	public function withDescription(?string $description): UpdateNamespaceRequest {
		$this->description = $description;
		return $this;
	}
    /** @return string|null Log Export Method */
	public function getType(): ?string {
		return $this->type;
	}
    /** @param string|null $type Log Export Method */
	public function setType(?string $type) {
		$this->type = $type;
	}
    /**
     * @param string|null $type Log Export Method
     * @return UpdateNamespaceRequest
     */
	public function withType(?string $type): UpdateNamespaceRequest {
		$this->type = $type;
		return $this;
	}
    /** @return string|null GCP Credentials */
	public function getGcpCredentialJson(): ?string {
		return $this->gcpCredentialJson;
	}
    /** @param string|null $gcpCredentialJson GCP Credentials */
	public function setGcpCredentialJson(?string $gcpCredentialJson) {
		$this->gcpCredentialJson = $gcpCredentialJson;
	}
    /**
     * @param string|null $gcpCredentialJson GCP Credentials
     * @return UpdateNamespaceRequest
     */
	public function withGcpCredentialJson(?string $gcpCredentialJson): UpdateNamespaceRequest {
		$this->gcpCredentialJson = $gcpCredentialJson;
		return $this;
	}
    /** @return string|null BigQuery Dataset Name */
	public function getBigQueryDatasetName(): ?string {
		return $this->bigQueryDatasetName;
	}
    /** @param string|null $bigQueryDatasetName BigQuery Dataset Name */
	public function setBigQueryDatasetName(?string $bigQueryDatasetName) {
		$this->bigQueryDatasetName = $bigQueryDatasetName;
	}
    /**
     * @param string|null $bigQueryDatasetName BigQuery Dataset Name
     * @return UpdateNamespaceRequest
     */
	public function withBigQueryDatasetName(?string $bigQueryDatasetName): UpdateNamespaceRequest {
		$this->bigQueryDatasetName = $bigQueryDatasetName;
		return $this;
	}
    /** @return int|null Log Retention Period (days) */
	public function getLogExpireDays(): ?int {
		return $this->logExpireDays;
	}
    /** @param int|null $logExpireDays Log Retention Period (days) */
	public function setLogExpireDays(?int $logExpireDays) {
		$this->logExpireDays = $logExpireDays;
	}
    /**
     * @param int|null $logExpireDays Log Retention Period (days)
     * @return UpdateNamespaceRequest
     */
	public function withLogExpireDays(?int $logExpireDays): UpdateNamespaceRequest {
		$this->logExpireDays = $logExpireDays;
		return $this;
	}
    /** @return string|null AWS Region */
	public function getAwsRegion(): ?string {
		return $this->awsRegion;
	}
    /** @param string|null $awsRegion AWS Region */
	public function setAwsRegion(?string $awsRegion) {
		$this->awsRegion = $awsRegion;
	}
    /**
     * @param string|null $awsRegion AWS Region
     * @return UpdateNamespaceRequest
     */
	public function withAwsRegion(?string $awsRegion): UpdateNamespaceRequest {
		$this->awsRegion = $awsRegion;
		return $this;
	}
    /** @return string|null AWS Access Key ID */
	public function getAwsAccessKeyId(): ?string {
		return $this->awsAccessKeyId;
	}
    /** @param string|null $awsAccessKeyId AWS Access Key ID */
	public function setAwsAccessKeyId(?string $awsAccessKeyId) {
		$this->awsAccessKeyId = $awsAccessKeyId;
	}
    /**
     * @param string|null $awsAccessKeyId AWS Access Key ID
     * @return UpdateNamespaceRequest
     */
	public function withAwsAccessKeyId(?string $awsAccessKeyId): UpdateNamespaceRequest {
		$this->awsAccessKeyId = $awsAccessKeyId;
		return $this;
	}
    /** @return string|null AWS Secret Access Key */
	public function getAwsSecretAccessKey(): ?string {
		return $this->awsSecretAccessKey;
	}
    /** @param string|null $awsSecretAccessKey AWS Secret Access Key */
	public function setAwsSecretAccessKey(?string $awsSecretAccessKey) {
		$this->awsSecretAccessKey = $awsSecretAccessKey;
	}
    /**
     * @param string|null $awsSecretAccessKey AWS Secret Access Key
     * @return UpdateNamespaceRequest
     */
	public function withAwsSecretAccessKey(?string $awsSecretAccessKey): UpdateNamespaceRequest {
		$this->awsSecretAccessKey = $awsSecretAccessKey;
		return $this;
	}
    /** @return string|null Kinesis Firehose Stream Name */
	public function getFirehoseStreamName(): ?string {
		return $this->firehoseStreamName;
	}
    /** @param string|null $firehoseStreamName Kinesis Firehose Stream Name */
	public function setFirehoseStreamName(?string $firehoseStreamName) {
		$this->firehoseStreamName = $firehoseStreamName;
	}
    /**
     * @param string|null $firehoseStreamName Kinesis Firehose Stream Name
     * @return UpdateNamespaceRequest
     */
	public function withFirehoseStreamName(?string $firehoseStreamName): UpdateNamespaceRequest {
		$this->firehoseStreamName = $firehoseStreamName;
		return $this;
	}
    /** @return string|null Compress Data for Kinesis Firehose */
	public function getFirehoseCompressData(): ?string {
		return $this->firehoseCompressData;
	}
    /** @param string|null $firehoseCompressData Compress Data for Kinesis Firehose */
	public function setFirehoseCompressData(?string $firehoseCompressData) {
		$this->firehoseCompressData = $firehoseCompressData;
	}
    /**
     * @param string|null $firehoseCompressData Compress Data for Kinesis Firehose
     * @return UpdateNamespaceRequest
     */
	public function withFirehoseCompressData(?string $firehoseCompressData): UpdateNamespaceRequest {
		$this->firehoseCompressData = $firehoseCompressData;
		return $this;
	}

    public static function fromJson(?array $data): ?UpdateNamespaceRequest {
        if ($data === null) {
            return null;
        }
        return (new UpdateNamespaceRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withDescription(array_key_exists('description', $data) && $data['description'] !== null ? $data['description'] : null)
            ->withType(array_key_exists('type', $data) && $data['type'] !== null ? $data['type'] : null)
            ->withGcpCredentialJson(array_key_exists('gcpCredentialJson', $data) && $data['gcpCredentialJson'] !== null ? $data['gcpCredentialJson'] : null)
            ->withBigQueryDatasetName(array_key_exists('bigQueryDatasetName', $data) && $data['bigQueryDatasetName'] !== null ? $data['bigQueryDatasetName'] : null)
            ->withLogExpireDays(array_key_exists('logExpireDays', $data) && $data['logExpireDays'] !== null ? $data['logExpireDays'] : null)
            ->withAwsRegion(array_key_exists('awsRegion', $data) && $data['awsRegion'] !== null ? $data['awsRegion'] : null)
            ->withAwsAccessKeyId(array_key_exists('awsAccessKeyId', $data) && $data['awsAccessKeyId'] !== null ? $data['awsAccessKeyId'] : null)
            ->withAwsSecretAccessKey(array_key_exists('awsSecretAccessKey', $data) && $data['awsSecretAccessKey'] !== null ? $data['awsSecretAccessKey'] : null)
            ->withFirehoseStreamName(array_key_exists('firehoseStreamName', $data) && $data['firehoseStreamName'] !== null ? $data['firehoseStreamName'] : null)
            ->withFirehoseCompressData(array_key_exists('firehoseCompressData', $data) && $data['firehoseCompressData'] !== null ? $data['firehoseCompressData'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "description" => $this->getDescription(),
            "type" => $this->getType(),
            "gcpCredentialJson" => $this->getGcpCredentialJson(),
            "bigQueryDatasetName" => $this->getBigQueryDatasetName(),
            "logExpireDays" => $this->getLogExpireDays(),
            "awsRegion" => $this->getAwsRegion(),
            "awsAccessKeyId" => $this->getAwsAccessKeyId(),
            "awsSecretAccessKey" => $this->getAwsSecretAccessKey(),
            "firehoseStreamName" => $this->getFirehoseStreamName(),
            "firehoseCompressData" => $this->getFirehoseCompressData(),
        );
    }
}