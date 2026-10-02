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
 * Namespace
 *
 * @see https://docs.gs2.io/api_reference/log/sdk/#namespace
 */
class Namespace_ implements IModel {
	/**
     * @var string Namespace GRN
	 */
	private $namespaceId;
	/**
     * @var string Namespace name
	 */
	private $name;
	/**
     * @var string Description
	 */
	private $description;
	/**
     * @var string Log Export Method
	 */
	private $type;
	/**
     * @var string GCP Credentials
	 */
	private $gcpCredentialJson;
	/**
     * @var string BigQuery Dataset Name
	 */
	private $bigQueryDatasetName;
	/**
     * @var int Log Retention Period (days)
	 */
	private $logExpireDays;
	/**
     * @var string AWS Region
	 */
	private $awsRegion;
	/**
     * @var string AWS Access Key ID
	 */
	private $awsAccessKeyId;
	/**
     * @var string AWS Secret Access Key
	 */
	private $awsSecretAccessKey;
	/**
     * @var string Kinesis Firehose Stream Name
	 */
	private $firehoseStreamName;
	/**
     * @var string Compress Data for Kinesis Firehose
	 */
	private $firehoseCompressData;
	/**
     * @var string Status
	 */
	private $status;
	/**
     * @var int Creation Timestamp
	 */
	private $createdAt;
	/**
     * @var int Last Updated Timestamp
	 */
	private $updatedAt;
	/**
     * @var int Revision
	 */
	private $revision;
    /** @return string|null Namespace GRN */
	public function getNamespaceId(): ?string {
		return $this->namespaceId;
	}
    /** @param string|null $namespaceId Namespace GRN */
	public function setNamespaceId(?string $namespaceId) {
		$this->namespaceId = $namespaceId;
	}
    /**
     * @param string|null $namespaceId Namespace GRN
     * @return Namespace_
     */
	public function withNamespaceId(?string $namespaceId): Namespace_ {
		$this->namespaceId = $namespaceId;
		return $this;
	}
    /** @return string|null Namespace name */
	public function getName(): ?string {
		return $this->name;
	}
    /** @param string|null $name Namespace name */
	public function setName(?string $name) {
		$this->name = $name;
	}
    /**
     * @param string|null $name Namespace name
     * @return Namespace_
     */
	public function withName(?string $name): Namespace_ {
		$this->name = $name;
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
     * @return Namespace_
     */
	public function withDescription(?string $description): Namespace_ {
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
     * @return Namespace_
     */
	public function withType(?string $type): Namespace_ {
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
     * @return Namespace_
     */
	public function withGcpCredentialJson(?string $gcpCredentialJson): Namespace_ {
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
     * @return Namespace_
     */
	public function withBigQueryDatasetName(?string $bigQueryDatasetName): Namespace_ {
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
     * @return Namespace_
     */
	public function withLogExpireDays(?int $logExpireDays): Namespace_ {
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
     * @return Namespace_
     */
	public function withAwsRegion(?string $awsRegion): Namespace_ {
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
     * @return Namespace_
     */
	public function withAwsAccessKeyId(?string $awsAccessKeyId): Namespace_ {
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
     * @return Namespace_
     */
	public function withAwsSecretAccessKey(?string $awsSecretAccessKey): Namespace_ {
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
     * @return Namespace_
     */
	public function withFirehoseStreamName(?string $firehoseStreamName): Namespace_ {
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
     * @return Namespace_
     */
	public function withFirehoseCompressData(?string $firehoseCompressData): Namespace_ {
		$this->firehoseCompressData = $firehoseCompressData;
		return $this;
	}
    /** @return string|null Status */
	public function getStatus(): ?string {
		return $this->status;
	}
    /** @param string|null $status Status */
	public function setStatus(?string $status) {
		$this->status = $status;
	}
    /**
     * @param string|null $status Status
     * @return Namespace_
     */
	public function withStatus(?string $status): Namespace_ {
		$this->status = $status;
		return $this;
	}
    /** @return int|null Creation Timestamp */
	public function getCreatedAt(): ?int {
		return $this->createdAt;
	}
    /** @param int|null $createdAt Creation Timestamp */
	public function setCreatedAt(?int $createdAt) {
		$this->createdAt = $createdAt;
	}
    /**
     * @param int|null $createdAt Creation Timestamp
     * @return Namespace_
     */
	public function withCreatedAt(?int $createdAt): Namespace_ {
		$this->createdAt = $createdAt;
		return $this;
	}
    /** @return int|null Last Updated Timestamp */
	public function getUpdatedAt(): ?int {
		return $this->updatedAt;
	}
    /** @param int|null $updatedAt Last Updated Timestamp */
	public function setUpdatedAt(?int $updatedAt) {
		$this->updatedAt = $updatedAt;
	}
    /**
     * @param int|null $updatedAt Last Updated Timestamp
     * @return Namespace_
     */
	public function withUpdatedAt(?int $updatedAt): Namespace_ {
		$this->updatedAt = $updatedAt;
		return $this;
	}
    /** @return int|null Revision */
	public function getRevision(): ?int {
		return $this->revision;
	}
    /** @param int|null $revision Revision */
	public function setRevision(?int $revision) {
		$this->revision = $revision;
	}
    /**
     * @param int|null $revision Revision
     * @return Namespace_
     */
	public function withRevision(?int $revision): Namespace_ {
		$this->revision = $revision;
		return $this;
	}

    public static function fromJson(?array $data): ?Namespace_ {
        if ($data === null) {
            return null;
        }
        return (new Namespace_())
            ->withNamespaceId(array_key_exists('namespaceId', $data) && $data['namespaceId'] !== null ? $data['namespaceId'] : null)
            ->withName(array_key_exists('name', $data) && $data['name'] !== null ? $data['name'] : null)
            ->withDescription(array_key_exists('description', $data) && $data['description'] !== null ? $data['description'] : null)
            ->withType(array_key_exists('type', $data) && $data['type'] !== null ? $data['type'] : null)
            ->withGcpCredentialJson(array_key_exists('gcpCredentialJson', $data) && $data['gcpCredentialJson'] !== null ? $data['gcpCredentialJson'] : null)
            ->withBigQueryDatasetName(array_key_exists('bigQueryDatasetName', $data) && $data['bigQueryDatasetName'] !== null ? $data['bigQueryDatasetName'] : null)
            ->withLogExpireDays(array_key_exists('logExpireDays', $data) && $data['logExpireDays'] !== null ? $data['logExpireDays'] : null)
            ->withAwsRegion(array_key_exists('awsRegion', $data) && $data['awsRegion'] !== null ? $data['awsRegion'] : null)
            ->withAwsAccessKeyId(array_key_exists('awsAccessKeyId', $data) && $data['awsAccessKeyId'] !== null ? $data['awsAccessKeyId'] : null)
            ->withAwsSecretAccessKey(array_key_exists('awsSecretAccessKey', $data) && $data['awsSecretAccessKey'] !== null ? $data['awsSecretAccessKey'] : null)
            ->withFirehoseStreamName(array_key_exists('firehoseStreamName', $data) && $data['firehoseStreamName'] !== null ? $data['firehoseStreamName'] : null)
            ->withFirehoseCompressData(array_key_exists('firehoseCompressData', $data) && $data['firehoseCompressData'] !== null ? $data['firehoseCompressData'] : null)
            ->withStatus(array_key_exists('status', $data) && $data['status'] !== null ? $data['status'] : null)
            ->withCreatedAt(array_key_exists('createdAt', $data) && $data['createdAt'] !== null ? $data['createdAt'] : null)
            ->withUpdatedAt(array_key_exists('updatedAt', $data) && $data['updatedAt'] !== null ? $data['updatedAt'] : null)
            ->withRevision(array_key_exists('revision', $data) && $data['revision'] !== null ? $data['revision'] : null);
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
            "firehoseCompressData" => $this->getFirehoseCompressData(),
            "status" => $this->getStatus(),
            "createdAt" => $this->getCreatedAt(),
            "updatedAt" => $this->getUpdatedAt(),
            "revision" => $this->getRevision(),
        );
    }
}