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
 * Log Entry
 *
 * @see https://docs.gs2.io/api_reference/log/sdk/#logentry
 */
class LogEntry implements IModel {
	/**
     * @var int Timestamp
	 */
	private $timestamp;
	/**
     * @var string Status
	 */
	private $status;
	/**
     * @var int Duration (nanoseconds)
	 */
	private $duration;
	/**
     * @var string Raw Log Line Data
	 */
	private $line;
	/**
     * @var array Labels
	 */
	private $labels;
    /** @return int|null Timestamp */
	public function getTimestamp(): ?int {
		return $this->timestamp;
	}
    /** @param int|null $timestamp Timestamp */
	public function setTimestamp(?int $timestamp) {
		$this->timestamp = $timestamp;
	}
    /**
     * @param int|null $timestamp Timestamp
     * @return LogEntry
     */
	public function withTimestamp(?int $timestamp): LogEntry {
		$this->timestamp = $timestamp;
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
     * @return LogEntry
     */
	public function withStatus(?string $status): LogEntry {
		$this->status = $status;
		return $this;
	}
    /** @return int|null Duration (nanoseconds) */
	public function getDuration(): ?int {
		return $this->duration;
	}
    /** @param int|null $duration Duration (nanoseconds) */
	public function setDuration(?int $duration) {
		$this->duration = $duration;
	}
    /**
     * @param int|null $duration Duration (nanoseconds)
     * @return LogEntry
     */
	public function withDuration(?int $duration): LogEntry {
		$this->duration = $duration;
		return $this;
	}
    /** @return string|null Raw Log Line Data */
	public function getLine(): ?string {
		return $this->line;
	}
    /** @param string|null $line Raw Log Line Data */
	public function setLine(?string $line) {
		$this->line = $line;
	}
    /**
     * @param string|null $line Raw Log Line Data
     * @return LogEntry
     */
	public function withLine(?string $line): LogEntry {
		$this->line = $line;
		return $this;
	}
    /** @return array|null Labels */
	public function getLabels(): ?array {
		return $this->labels;
	}
    /** @param array|null $labels Labels */
	public function setLabels(?array $labels) {
		$this->labels = $labels;
	}
    /**
     * @param array|null $labels Labels
     * @return LogEntry
     */
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