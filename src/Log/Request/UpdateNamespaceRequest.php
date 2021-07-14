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

    public static function fromJson(?array $data): ?UpdateNamespaceRequest {
        if ($data === null) {
            return null;
        }
        return (new UpdateNamespaceRequest())
            ->withNamespaceName(empty($data['namespaceName']) ? null : $data['namespaceName'])
            ->withDescription(empty($data['description']) ? null : $data['description'])
            ->withType(empty($data['type']) ? null : $data['type'])
            ->withGcpCredentialJson(empty($data['gcpCredentialJson']) ? null : $data['gcpCredentialJson'])
            ->withBigQueryDatasetName(empty($data['bigQueryDatasetName']) ? null : $data['bigQueryDatasetName'])
            ->withLogExpireDays(empty($data['logExpireDays']) ? null : $data['logExpireDays'])
            ->withAwsRegion(empty($data['awsRegion']) ? null : $data['awsRegion'])
            ->withAwsAccessKeyId(empty($data['awsAccessKeyId']) ? null : $data['awsAccessKeyId'])
            ->withAwsSecretAccessKey(empty($data['awsSecretAccessKey']) ? null : $data['awsSecretAccessKey'])
            ->withFirehoseStreamName(empty($data['firehoseStreamName']) ? null : $data['firehoseStreamName']);
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
        );
    }
}