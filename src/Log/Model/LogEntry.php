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


class LogEntry implements IModel {
	/**
     * @var int
	 */
	private $timestamp;
	/**
     * @var string
	 */
	private $status;
	/**
     * @var int
	 */
	private $duration;
	/**
     * @var string
	 */
	private $line;
	/**
     * @var array
	 */
	private $labels;
	public function getTimestamp(): ?int {
		return $this->timestamp;
	}
	public function setTimestamp(?int $timestamp) {
		$this->timestamp = $timestamp;
	}
	public function withTimestamp(?int $timestamp): LogEntry {
		$this->timestamp = $timestamp;
		return $this;
	}
	public function getStatus(): ?string {
		return $this->status;
	}
	public function setStatus(?string $status) {
		$this->status = $status;
	}
	public function withStatus(?string $status): LogEntry {
		$this->status = $status;
		return $this;
	}
	public function getDuration(): ?int {
		return $this->duration;
	}
	public function setDuration(?int $duration) {
		$this->duration = $duration;
	}
	public function withDuration(?int $duration): LogEntry {
		$this->duration = $duration;
		return $this;
	}
	public function getLine(): ?string {
		return $this->line;
	}
	public function setLine(?string $line) {
		$this->line = $line;
	}
	public function withLine(?string $line): LogEntry {
		$this->line = $line;
		return $this;
	}
	public function getLabels(): ?array {
		return $this->labels;
	}
	public function setLabels(?array $labels) {
		$this->labels = $labels;
	}
	public function withLabels(?array $labels): LogEntry {
		$this->labels = $labels;
		return $this;
	}

    public static function fromJson(?array $data): ?LogEntry {
        if ($data === null) {
            return null;
        }
        return (new LogEntry())
            ->withTimestamp(array_key_exists('timestamp', $data) && $data['timestamp'] !== null ? $data['timestamp'] : null)
            ->withStatus(array_key_exists('status', $data) && $data['status'] !== null ? $data['status'] : null)
            ->withDuration(array_key_exists('duration', $data) && $data['duration'] !== null ? $data['duration'] : null)
            ->withLine(array_key_exists('line', $data) && $data['line'] !== null ? $data['line'] : null)
            ->withLabels(!array_key_exists('labels', $data) || $data['labels'] === null ? null : array_map(
                function ($item) {
                    return Label::fromJson($item);
                },
                $data['labels']
            ));
    }

    public function toJson(): array {
        return array(
            "timestamp" => $this->getTimestamp(),
            "status" => $this->getStatus(),
            "duration" => $this->getDuration(),
            "line" => $this->getLine(),
            "labels" => $this->getLabels() === null ? null : array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getLabels()
            ),
        );
    }
}