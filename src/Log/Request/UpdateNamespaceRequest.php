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

class UpdateNamespaceRequest extends Gs2BasicRequest {
    /** @var string */
    private $namespaceName;
    /** @var string */
    private $description;
    /** @var string */
    private $type;
    /** @var string */
    private $gcpCredentialJson;
    /** @var string */
    private $bigQueryDatasetName;
    /** @var int */
    private $logExpireDays;
    /** @var string */
    private $awsRegion;
    /** @var string */
    private $awsAccessKeyId;
    /** @var string */
    private $awsSecretAccessKey;
    /** @var string */
    private $firehoseStreamName;
    /** @var string */
    private $firehoseCompressData;
	public function getNamespaceName(): ?string {
		return $this->namespaceName;
	}
	public function setNamespaceName(?string $namespaceName) {
		$this->namespaceName = $namespaceName;
	}
	public function withNamespaceName(?string $namespaceName): UpdateNamespaceRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
	public function getDescription(): ?string {
		return $this->description;
	}
	public function setDescription(?string $description) {
		$this->description = $description;
	}
	public function withDescription(?string $description): UpdateNamespaceRequest {
		$this->description = $description;
		return $this;
	}
	public function getType(): ?string {
		return $this->type;
	}
	public function setType(?string $type) {
		$this->type = $type;
	}
	public function withType(?string $type): UpdateNamespaceRequest {
		$this->type = $type;
		return $this;
	}
	public function getGcpCredentialJson(): ?string {
		return $this->gcpCredentialJson;
	}
	public function setGcpCredentialJson(?string $gcpCredentialJson) {
		$this->gcpCredentialJson = $gcpCredentialJson;
	}
	public function withGcpCredentialJson(?string $gcpCredentialJson): UpdateNamespaceRequest {
		$this->gcpCredentialJson = $gcpCredentialJson;
		return $this;
	}
	public function getBigQueryDatasetName(): ?string {
		return $this->bigQueryDatasetName;
	}
	public function setBigQueryDatasetName(?string $bigQueryDatasetName) {
		$this->bigQueryDatasetName = $bigQueryDatasetName;
	}
	public function withBigQueryDatasetName(?string $bigQueryDatasetName): UpdateNamespaceRequest {
		$this->bigQueryDatasetName = $bigQueryDatasetName;
		return $this;
	}
	public function getLogExpireDays(): ?int {
		return $this->logExpireDays;
	}
	public function setLogExpireDays(?int $logExpireDays) {
		$this->logExpireDays = $logExpireDays;
	}
	public function withLogExpireDays(?int $logExpireDays): UpdateNamespaceRequest {
		$this->logExpireDays = $logExpireDays;
		return $this;
	}
	public function getAwsRegion(): ?string {
		return $this->awsRegion;
	}
	public function setAwsRegion(?string $awsRegion) {
		$this->awsRegion = $awsRegion;
	}
	public function withAwsRegion(?string $awsRegion): UpdateNamespaceRequest {
		$this->awsRegion = $awsRegion;
		return $this;
	}
	public function getAwsAccessKeyId(): ?string {
		return $this->awsAccessKeyId;
	}
	public function setAwsAccessKeyId(?string $awsAccessKeyId) {
		$this->awsAccessKeyId = $awsAccessKeyId;
	}
	public function withAwsAccessKeyId(?string $awsAccessKeyId): UpdateNamespaceRequest {
		$this->awsAccessKeyId = $awsAccessKeyId;
		return $this;
	}
	public function getAwsSecretAccessKey(): ?string {
		return $this->awsSecretAccessKey;
	}
	public function setAwsSecretAccessKey(?string $awsSecretAccessKey) {
		$this->awsSecretAccessKey = $awsSecretAccessKey;
	}
	public function withAwsSecretAccessKey(?string $awsSecretAccessKey): UpdateNamespaceRequest {
		$this->awsSecretAccessKey = $awsSecretAccessKey;
		return $this;
	}
	public function getFirehoseStreamName(): ?string {
		return $this->firehoseStreamName;
	}
	public function setFirehoseStreamName(?string $firehoseStreamName) {
		$this->firehoseStreamName = $firehoseStreamName;
	}
	public function withFirehoseStreamName(?string $firehoseStreamName): UpdateNamespaceRequest {
		$this->firehoseStreamName = $firehoseStreamName;
		return $this;
	}
	public function getFirehoseCompressData(): ?string {
		return $this->firehoseCompressData;
	}
	public function setFirehoseCompressData(?string $firehoseCompressData) {
		$this->firehoseCompressData = $firehoseCompressData;
	}
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