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


class Namespace_ implements IModel {
	/**
     * @var string
	 */
	private $namespaceId;
	/**
     * @var string
	 */
	private $name;
	/**
     * @var string
	 */
	private $description;
	/**
     * @var string
	 */
	private $type;
	/**
     * @var string
	 */
	private $gcpCredentialJson;
	/**
     * @var string
	 */
	private $bigQueryDatasetName;
	/**
     * @var int
	 */
	private $logExpireDays;
	/**
     * @var string
	 */
	private $awsRegion;
	/**
     * @var string
	 */
	private $awsAccessKeyId;
	/**
     * @var string
	 */
	private $awsSecretAccessKey;
	/**
     * @var string
	 */
	private $firehoseStreamName;
	/**
     * @var string
	 */
	private $status;
	/**
     * @var int
	 */
	private $createdAt;
	/**
     * @var int
	 */
	private $updatedAt;

	public function getNamespaceId(): ?string {
		return $this->namespaceId;
	}

	public function setNamespaceId(?string $namespaceId) {
		$this->namespaceId = $namespaceId;
	}

	public function withNamespaceId(?string $namespaceId): Namespace_ {
		$this->namespaceId = $namespaceId;
		return $this;
	}

	public function getName(): ?string {
		return $this->name;
	}

	public function setName(?string $name) {
		$this->name = $name;
	}

	public function withName(?string $name): Namespace_ {
		$this->name = $name;
		return $this;
	}

	public function getDescription(): ?string {
		return $this->description;
	}

	public function setDescription(?string $description) {
		$this->description = $description;
	}

	public function withDescription(?string $description): Namespace_ {
		$this->description = $description;
		return $this;
	}

	public function getType(): ?string {
		return $this->type;
	}

	public function setType(?string $type) {
		$this->type = $type;
	}

	public function withType(?string $type): Namespace_ {
		$this->type = $type;
		return $this;
	}

	public function getGcpCredentialJson(): ?string {
		return $this->gcpCredentialJson;
	}

	public function setGcpCredentialJson(?string $gcpCredentialJson) {
		$this->gcpCredentialJson = $gcpCredentialJson;
	}

	public function withGcpCredentialJson(?string $gcpCredentialJson): Namespace_ {
		$this->gcpCredentialJson = $gcpCredentialJson;
		return $this;
	}

	public function getBigQueryDatasetName(): ?string {
		return $this->bigQueryDatasetName;
	}

	public function setBigQueryDatasetName(?string $bigQueryDatasetName) {
		$this->bigQueryDatasetName = $bigQueryDatasetName;
	}

	public function withBigQueryDatasetName(?string $bigQueryDatasetName): Namespace_ {
		$this->bigQueryDatasetName = $bigQueryDatasetName;
		return $this;
	}

	public function getLogExpireDays(): ?int {
		return $this->logExpireDays;
	}

	public function setLogExpireDays(?int $logExpireDays) {
		$this->logExpireDays = $logExpireDays;
	}

	public function withLogExpireDays(?int $logExpireDays): Namespace_ {
		$this->logExpireDays = $logExpireDays;
		return $this;
	}

	public function getAwsRegion(): ?string {
		return $this->awsRegion;
	}

	public function setAwsRegion(?string $awsRegion) {
		$this->awsRegion = $awsRegion;
	}

	public function withAwsRegion(?string $awsRegion): Namespace_ {
		$this->awsRegion = $awsRegion;
		return $this;
	}

	public function getAwsAccessKeyId(): ?string {
		return $this->awsAccessKeyId;
	}

	public function setAwsAccessKeyId(?string $awsAccessKeyId) {
		$this->awsAccessKeyId = $awsAccessKeyId;
	}

	public function withAwsAccessKeyId(?string $awsAccessKeyId): Namespace_ {
		$this->awsAccessKeyId = $awsAccessKeyId;
		return $this;
	}

	public function getAwsSecretAccessKey(): ?string {
		return $this->awsSecretAccessKey;
	}

	public function setAwsSecretAccessKey(?string $awsSecretAccessKey) {
		$this->awsSecretAccessKey = $awsSecretAccessKey;
	}

	public function withAwsSecretAccessKey(?string $awsSecretAccessKey): Namespace_ {
		$this->awsSecretAccessKey = $awsSecretAccessKey;
		return $this;
	}

	public function getFirehoseStreamName(): ?string {
		return $this->firehoseStreamName;
	}

	public function setFirehoseStreamName(?string $firehoseStreamName) {
		$this->firehoseStreamName = $firehoseStreamName;
	}

	public function withFirehoseStreamName(?string $firehoseStreamName): Namespace_ {
		$this->firehoseStreamName = $firehoseStreamName;
		return $this;
	}

	public function getStatus(): ?string {
		return $this->status;
	}

	public function setStatus(?string $status) {
		$this->status = $status;
	}

	public function withStatus(?string $status): Namespace_ {
		$this->status = $status;
		return $this;
	}

	public function getCreatedAt(): ?int {
		return $this->createdAt;
	}

	public function setCreatedAt(?int $createdAt) {
		$this->createdAt = $createdAt;
	}

	public function withCreatedAt(?int $createdAt): Namespace_ {
		$this->createdAt = $createdAt;
		return $this;
	}

	public function getUpdatedAt(): ?int {
		return $this->updatedAt;
	}

	public function setUpdatedAt(?int $updatedAt) {
		$this->updatedAt = $updatedAt;
	}

	public function withUpdatedAt(?int $updatedAt): Namespace_ {
		$this->updatedAt = $updatedAt;
		return $this;
	}

    public static function fromJson(?array $data): ?Namespace_ {
        if ($data === null) {
            return null;
        }
        return (new Namespace_())
            ->withNamespaceId(empty($data['namespaceId']) ? null : $data['namespaceId'])
            ->withName(empty($data['name']) ? null : $data['name'])
            ->withDescription(empty($data['description']) ? null : $data['description'])
            ->withType(empty($data['type']) ? null : $data['type'])
            ->withGcpCredentialJson(empty($data['gcpCredentialJson']) ? null : $data['gcpCredentialJson'])
            ->withBigQueryDatasetName(empty($data['bigQueryDatasetName']) ? null : $data['bigQueryDatasetName'])
            ->withLogExpireDays(empty($data['logExpireDays']) && $data['logExpireDays'] !== 0 ? null : $data['logExpireDays'])
            ->withAwsRegion(empty($data['awsRegion']) ? null : $data['awsRegion'])
            ->withAwsAccessKeyId(empty($data['awsAccessKeyId']) ? null : $data['awsAccessKeyId'])
            ->withAwsSecretAccessKey(empty($data['awsSecretAccessKey']) ? null : $data['awsSecretAccessKey'])
            ->withFirehoseStreamName(empty($data['firehoseStreamName']) ? null : $data['firehoseStreamName'])
            ->withStatus(empty($data['status']) ? null : $data['status'])
            ->withCreatedAt(empty($data['createdAt']) && $data['createdAt'] !== 0 ? null : $data['createdAt'])
            ->withUpdatedAt(empty($data['updatedAt']) && $data['updatedAt'] !== 0 ? null : $data['updatedAt']);
    }

    public function toJson(): array {
        return array(
            "namespaceId" => $this->getNamespaceId(),
            "name" => $this->getName(),
            "description" => $this->getDescription(),
            "type" => $this->getType(),
            "gcpCredentialJson" => $this->getGcpCredentialJson(),
            "bigQueryDatasetName" => $this->getBigQueryDatasetName(),
            "logExpireDays" => $this->getLogExpireDays(),
            "awsRegion" => $this->getAwsRegion(),
            "awsAccessKeyId" => $this->getAwsAccessKeyId(),
            "awsSecretAccessKey" => $this->getAwsSecretAccessKey(),
            "firehoseStreamName" => $this->getFirehoseStreamName(),
            "status" => $this->getStatus(),
            "createdAt" => $this->getCreatedAt(),
            "updatedAt" => $this->getUpdatedAt(),
        );
    }
}