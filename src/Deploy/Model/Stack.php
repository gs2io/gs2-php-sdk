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
 * Stack
 *
 * @see https://docs.gs2.io/api_reference/deploy/sdk/#stack
 */
class Stack implements IModel {
	/**
     * @var string Stack GRN
	 */
	private $stackId;
	/**
     * @var string Stack name
	 */
	private $name;
	/**
     * @var string Description
	 */
	private $description;
	/**
     * @var string Template data
	 */
	private $template;
	/**
     * @var string Execution state
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
    /** @return string|null Stack GRN */
	public function getStackId(): ?string {
		return $this->stackId;
	}
    /** @param string|null $stackId Stack GRN */
	public function setStackId(?string $stackId) {
		$this->stackId = $stackId;
	}
    /**
     * @param string|null $stackId Stack GRN
     * @return Stack
     */
	public function withStackId(?string $stackId): Stack {
		$this->stackId = $stackId;
		return $this;
	}
    /** @return string|null Stack name */
	public function getName(): ?string {
		return $this->name;
	}
    /** @param string|null $name Stack name */
	public function setName(?string $name) {
		$this->name = $name;
	}
    /**
     * @param string|null $name Stack name
     * @return Stack
     */
	public function withName(?string $name): Stack {
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
     * @return Stack
     */
	public function withDescription(?string $description): Stack {
		$this->description = $description;
		return $this;
	}
    /** @return string|null Template data */
	public function getTemplate(): ?string {
		return $this->template;
	}
    /** @param string|null $template Template data */
	public function setTemplate(?string $template) {
		$this->template = $template;
	}
    /**
     * @param string|null $template Template data
     * @return Stack
     */
	public function withTemplate(?string $template): Stack {
		$this->template = $template;
		return $this;
	}
    /** @return string|null Execution state */
	public function getStatus(): ?string {
		return $this->status;
	}
    /** @param string|null $status Execution state */
	public function setStatus(?string $status) {
		$this->status = $status;
	}
    /**
     * @param string|null $status Execution state
     * @return Stack
     */
	public function withStatus(?string $status): Stack {
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
     * @return Stack
     */
	public function withCreatedAt(?int $createdAt): Stack {
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
     * @return Stack
     */
	public function withUpdatedAt(?int $updatedAt): Stack {
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
     * @return Stack
     */
	public function withRevision(?int $revision): Stack {
		$this->revision = $revision;
		return $this;
	}

    public static function fromJson(?array $data): ?Stack {
        if ($data === null) {
            return null;
        }
        return (new Stack())
            ->withStackId(array_key_exists('stackId', $data) && $data['stackId'] !== null ? $data['stackId'] : null)
            ->withName(array_key_exists('name', $data) && $data['name'] !== null ? $data['name'] : null)
            ->withDescription(array_key_exists('description', $data) && $data['description'] !== null ? $data['description'] : null)
            ->withTemplate(array_key_exists('template', $data) && $data['template'] !== null ? $data['template'] : null)
            ->withStatus(array_key_exists('status', $data) && $data['status'] !== null ? $data['status'] : null)
            ->withCreatedAt(array_key_exists('createdAt', $data) && $data['createdAt'] !== null ? $data['createdAt'] : null)
            ->withUpdatedAt(array_key_exists('updatedAt', $data) && $data['updatedAt'] !== null ? $data['updatedAt'] : null)
            ->withRevision(array_key_exists('revision', $data) && $data['revision'] !== null ? $data['revision'] : null);
    }

    public function toJson(): array {
        return array(
            "stackId" => $this->getStackId(),
            "name" => $this->getName(),
            "description" => $this->getDescription(),
            "template" => $this->getTemplate(),
            "status" => $this->getStatus(),
            "createdAt" => $this->getCreatedAt(),
            "updatedAt" => $this->getUpdatedAt(),
            "revision" => $this->getRevision(),
        );
    }
}