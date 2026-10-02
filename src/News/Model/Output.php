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

namespace Gs2\News\Model;

use Gs2\Core\Model\IModel;


/**
 * Output
 *
 * @see https://docs.gs2.io/api_reference/news/sdk/#output
 */
class Output implements IModel {
	/**
     * @var string Output of content generation progress GRN
	 */
	private $outputId;
	/**
     * @var string Output Name
	 */
	private $name;
	/**
     * @var string Text
	 */
	private $text;
	/**
     * @var int Creation Timestamp
	 */
	private $createdAt;
	/**
     * @var int Revision
	 */
	private $revision;
    /** @return string|null Output of content generation progress GRN */
	public function getOutputId(): ?string {
		return $this->outputId;
	}
    /** @param string|null $outputId Output of content generation progress GRN */
	public function setOutputId(?string $outputId) {
		$this->outputId = $outputId;
	}
    /**
     * @param string|null $outputId Output of content generation progress GRN
     * @return Output
     */
	public function withOutputId(?string $outputId): Output {
		$this->outputId = $outputId;
		return $this;
	}
    /** @return string|null Output Name */
	public function getName(): ?string {
		return $this->name;
	}
    /** @param string|null $name Output Name */
	public function setName(?string $name) {
		$this->name = $name;
	}
    /**
     * @param string|null $name Output Name
     * @return Output
     */
	public function withName(?string $name): Output {
		$this->name = $name;
		return $this;
	}
    /** @return string|null Text */
	public function getText(): ?string {
		return $this->text;
	}
    /** @param string|null $text Text */
	public function setText(?string $text) {
		$this->text = $text;
	}
    /**
     * @param string|null $text Text
     * @return Output
     */
	public function withText(?string $text): Output {
		$this->text = $text;
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
     * @return Output
     */
	public function withCreatedAt(?int $createdAt): Output {
		$this->createdAt = $createdAt;
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
     * @return Output
     */
	public function withRevision(?int $revision): Output {
		$this->revision = $revision;
		return $this;
	}

    public static function fromJson(?array $data): ?Output {
        if ($data === null) {
            return null;
        }
        return (new Output())
            ->withOutputId(array_key_exists('outputId', $data) && $data['outputId'] !== null ? $data['outputId'] : null)
            ->withName(array_key_exists('name', $data) && $data['name'] !== null ? $data['name'] : null)
            ->withText(array_key_exists('text', $data) && $data['text'] !== null ? $data['text'] : null)
            ->withCreatedAt(array_key_exists('createdAt', $data) && $data['createdAt'] !== null ? $data['createdAt'] : null)
            ->withRevision(array_key_exists('revision', $data) && $data['revision'] !== null ? $data['revision'] : null);
    }

    public function toJson(): array {
        return array(
            "outputId" => $this->getOutputId(),
            "name" => $this->getName(),
            "text" => $this->getText(),
            "createdAt" => $this->getCreatedAt(),
            "revision" => $this->getRevision(),
        );
    }
}